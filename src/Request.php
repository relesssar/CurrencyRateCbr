<?php
/**
 * Code for obtaining and parsing XML-data on currency rates of the Central Bank of the Russian Federation.
 * PHP version 5.6, 7.X
 *
 * About:
 * http://www.cbr.ru/development/SXML/
 *
 * @package andydune/currency-rate-cbr
 * @link  https://github.com/AndyDune/CurrencyRateCbr for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2018 Andrey Ryzhov
 */


namespace AndyDune\CurrencyRateCbr;
use GuzzleHttp\Client;

class Request
{
    protected $uriXmlDaily = 'http://www.cbr.ru/scripts/XML_daily.asp';
    protected $query = [];

    public function execute()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', $this->buildUri());
        $code = $res->getStatusCode(); // 200
        $contentType = $res->getHeaderLine('content-type'); // application/xml; charset=windows-1251
        $body = $res->getBody(); // xml body
    }

    public function addQuery($key, $value)
    {
        $this->query[$key] = $value;
        return $this;
    }

    protected function buildUri()
    {
        $path = $this->uriXmlDaily;
        if ($this->query) {
            $path .= '?' . http_build_query($this->query);
        }
        return $path;
    }
}