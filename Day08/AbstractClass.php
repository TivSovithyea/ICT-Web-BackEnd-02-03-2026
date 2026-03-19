<?php

abstract class ReportGenerator
{

    abstract protected function fetchData();
    abstract protected function render($data);
    protected function sort($data)
    {
        sort($data);
        return $data;
    }

    final public function generate()
    {
        $data = $this->fetchData();
        $sorted = $this->sort($data);
        $body = $this->render($sorted);
        return "<report>\n$body\n</report>";
    }
}

class SaleReport extends ReportGenerator
{
    protected function fetchData()
    {
        return [15, 20, 5, 3, 50];
    }

    protected function render($data)
    {
        return implode(", ", $data);
    }
}

class PurchaseReport extends ReportGenerator
{
    protected function fetchData()
    {
        return [15000, 20000, 5000, 3000, 5000];
    }

    protected function render($data)
    {
        return implode("$, ", $data);
    }
}

class PurchaseReportVersion2 extends PurchaseReport {}

echo "<h1>Sale Report</h1>";
echo (new SaleReport())->generate();
echo "<h1>Purchase Report</h1>";
echo (new PurchaseReport())->generate();
echo "<h1>Purchase Report Version II</h1>";
echo (new PurchaseReportVersion2())->generate();
