<?php

class DOMXPathDemo {
 private $xpath;
  
  public function __construct($filename) {
    $doc = new DOMDocument();
    $doc->load($filename);
    $this->xpath = new DOMXPath($doc);
  }
  
  public function display($expr) {
    $prices = $this->xpath->query($expr);
    foreach ($prices as $price) {
      echo $price->nodeValue . date("Y-m-d")  ."<br />";
    }
  }
  
  public function evaluate($expr) {
    $result = $this->xpath->evaluate($expr);
    echo $result . "<br />";
  }
}

$worker = new DOMXPathDemo("CDcatalog.xml");

echo "<p><h3>Using XPath expression '//price': </h3>";
$worker->display("//price");

echo "</p><p><h3>Using XPath expression '/catalog/cd/price': </h3>";
$worker->display("/catalog/cd/price");

echo "<p><h3>Using XPath expression '//title': </h3>";
$worker->display("//price");

echo "</p><p><h3>Using XPath expression '/catalog/cd/price': </h3>";
$worker->display("/catalog/cd/title");

echo "<p><h3>Using XPath expression '//price/text()': </h3>";
$worker->display("//price/text()");

echo "</p><p><h3>Using XPath expression '/catalog/cd/price/text()': </h3>";
$worker->display("/catalog/cd/price/text()");

echo "</p><p><h3>Using XPath expression '/catalog/cd[price<10]': </h3>";
$worker->display("/catalog/cd[price<10]");

echo "</p><p><h3>Using XPath expression '/catalog/cd[@country='UK']/price/text()': </h3>";
$worker->display("/catalog/cd[@country='UK']/price/text()");

echo "</p><p><h3>Using XPath expression '/catalog/cd/@country': </h3>";
$worker->display("/catalog/cd/@country");

echo "</p><p><h3>Using XPath expression 'count(//artist)': </h3>";
$worker->evaluate("count(//artist)");

echo "</p><p><h3>Using XPath expression 'sum(//cd[price < 10]/price)': </h3>";
$worker->evaluate("sum(//cd[price < 10]/price)");

/////////////////check time range for report
$paymentDate = date('Y-m-d');
$paymentDate=date('Y-m-d', strtotime($paymentDate));
//echo $paymentDate; // echos today! 
$contractDateBegin = date('Y-m-d', strtotime("01/01/2001"));
$contractDateEnd = date('Y-m-d', strtotime("01/01/2020"));
    
if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)){
    echo "is between";
}else{
    echo "NO GO!";  
}
?>
