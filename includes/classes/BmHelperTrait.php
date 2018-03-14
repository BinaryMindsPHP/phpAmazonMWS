<?php

trait BmHelperTrait
{
    public function getUrl()
    {
        return $this->urlbase . $this->urlbranch;
    }

    public function getAllRequestParams()
    {
        $requestParams = [];

        $queryString = $this->genQuery();
        $tmpData = explode('&', $queryString);

        foreach ($tmpData as $param) {
            $exploadedParam = explode('=', $param);
            $requestParams[$exploadedParam[0]] = rawurldecode($exploadedParam[1]);
        }

        return $requestParams;
    }
}