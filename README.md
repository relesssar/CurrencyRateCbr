# Курсы валют ЦБ России

[![Build Status](https://travis-ci.org/AndyDune/CurrencyRateCbr.svg?branch=master)](https://travis-ci.org/AndyDune/CurrencyRateCbr)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/andydune/currency-rate-cbr.svg?style=flat-square)](https://packagist.org/packages/andydune/currency-rate-cbr)
[![Total Downloads](https://img.shields.io/packagist/dt/andydune/currency-rate-cbr.svg?style=flat-square)](https://packagist.org/packages/andydune/currency-rate-cbr)


Библиотека для получения и парсинга XML-данных о курсах валют.

Источник данных: [Получение данных, используя XML](http://www.cbr.ru/development/SXML/)


Installation
------------

Installation using composer:

```
composer require andydune/currency-rate-cbr
```
Or if composer was not installed globally:
```
php composer.phar require andydune/currency-rate-cbr
```
Or edit your `composer.json`:
```
"require" : {
     "andydune/currency-rate-cbr": "^1"
}

```
And execute command:
```
php composer.phar update
```