<?php

namespace AndyDune\CurrencyRateCbr;

class Currency extends DailyRate
{
    public function retrieve()
    {
        $this->data = null;
        $request = $this->getRequest();

        $request->execute(Request::URI_XML_VALFULL);

        if ($request->getRequestError() or $request->getResponseCode() != 200) {
            return false;
        }
        $xml = $request->getResponseBody();
        if (!preg_match('|<?xml version="1.0"|i', $xml)) {
            return false;
        }
        $parser = $this->parse($xml);

        return $parser;

    }

    public function parse($xml)
    {
        $data = [];
        $simple = new \SimpleXMLElement($xml);

        foreach ($simple->Item as $row) {
            $data[(string)$row->ISO_Char_Code] = (string)$row->Name;
        }

        $this->xmlParser = $data;

        return $this->xmlParser;
    }
}
