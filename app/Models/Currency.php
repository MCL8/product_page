<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtownsend\XmlToArray\XmlToArray;

class Currency extends Model
{
    use HasFactory;

    const CURRENCY_SYMBOLS = [
        'kzt' => '₸',
        'rub' => '₽'
    ];

    protected $fillable = ['name', 'code', 'value'];

    public static function getRate($currencyCode)
    {
        $currency = self::where('code', $currencyCode)->firstOrFail();

        if (!$currency) {
            return false;
        }

        return $currency->value;
    }

    public static function updateRates()
    {
        $ratesXml = file_get_contents('https://nationalbank.kz/rss/rates_all.xml');
        $ratesArray = XmlToArray::convert($ratesXml);

        if (!isset($ratesArray['channel']['item']) || !is_array($ratesArray['channel']['item'])) {
            return false;
        }

        $rubValue = null;
        foreach ($ratesArray['channel']['item'] as $item) {
            if ($item['title'] == 'RUB') {
                $rubValue = (float)$item['description'];
                break;
            }
        }

        if (!$rubValue) {
            return false;
        }

        $currencyRub = self::where('code', 'RUB')->firstOrFail();

        $currencyRub->value = $rubValue;
        return $currencyRub->save();
    }
}
