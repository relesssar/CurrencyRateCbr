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


class DailyRate
{
    /**
     * @var \DateTime|null
     */
    protected $date = null;

    /**
     * @var Request
     */
    protected $request = null;


    protected function retrieve()
    {
        $request = $this->getRequest();
        if ($this->date) {
            $request->addQuery('date_req', $this->date->format('d/m/Y'));
        }
        $request->execute(Request::URI_XML_DAILY);
        if (!$request->getRequestError()) {
            return false;
        }
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        if ($this->request) {
            return $this->request;
        }
        return new Request();
    }

    /**
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return DailyRate
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }


}