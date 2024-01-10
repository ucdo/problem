<?php
namespace app\index\logic;

use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * 需要 PhpOffice\PhpSpreadsheet包
 */
class StatisticsLogic
{
    private function bc_div (int $v1, int $v2): ?string
    {
        return bcdiv((string)$v1, (string)(empty($v2) ? 1 : $v2), 4) * 100 . '%';
    }
    
    private function wirte ($customizeField)
    {
        $excel_name = time() . '.' . IOFactory::WRITER_XLSX;
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
        
        $max = count($customizeField['title']) * 2 - 1;
        $tag = 65;
        // 先设置一下行宽
        for ( $m = 0; $m < $max; $m++ ) {
            $worksheet->getColumnDimension(chr($tag))->setWidth(15);
            ++$tag;
        }
        
        $lastRowIndex = 1;
        $i = 1;
        $key = 0;
        if ( $customizeField['header'] ) {
            $max = count($customizeField['title']) * 2 + 1;
            $a = chr($key + $lastRowIndex + 64) . ($i);
            $b = chr($key + $max + $lastRowIndex + 64) . ($i);
            $worksheet->mergeCells($a . ':' . $b);
            $line = $worksheet->getCell($a);
            $line->getStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $line->getStyle()->getFont()->setSize(22)->setBold(true);
            $line->setValueExplicit($customizeField['header'], DataType::TYPE_STRING);
            ++$key;
        }
        
        $key = 0;
        ++$i;
        // 这里是要写诊断分类，占用B1,C1
        $a = chr($key + $lastRowIndex + 64) . ($i);
        $b = chr($key + $lastRowIndex + 64) . ($i + 1);
        $worksheet->mergeCells($a . ':' . $b);
        $line = $worksheet->getCell($a);
        $line->getStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $line->setValueExplicit('xxxx', DataType::TYPE_STRING);
        
        // 妈的，先写一列
        ++$key;
        foreach ( $customizeField['title'] as $title ) {
            $a = chr($key + $lastRowIndex + 64) . ($i);
            $b = chr($key + 1 + $lastRowIndex + 64) . ($i);
            $worksheet->mergeCells($a . ':' . $b);
            $line = $worksheet->getCell($a);
            $line->setValueExplicit($title, DataType::TYPE_STRING);
            
            $worksheet->getStyle(chr($key + $lastRowIndex + 64) . ($i))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
            $worksheet->setCellValueExplicit(chr($key + $lastRowIndex + 64) . ($i + 1), '人数', DataType::TYPE_STRING);
            ++$key;
            $worksheet->getStyle(chr($key + $lastRowIndex + 64) . ($i))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
            $worksheet->setCellValueExplicit(chr($key + $lastRowIndex + 64) . ($i + 1), '占比', DataType::TYPE_STRING);
            ++$key;
        }
        ++$i;
        
        foreach ( $customizeField['cal'] as $factor_name => $cals ) {
            $j = 0;
            $worksheet->getStyle(chr($j + $lastRowIndex + 64) . ($i))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
            $worksheet->setCellValueExplicit(chr($j + $lastRowIndex + 64) . ($i + 1), $factor_name, DataType::TYPE_STRING);
            ++$j;
            foreach ( $cals as $cal ) {
                $worksheet->getStyle(chr($j + $lastRowIndex + 64) . ($i))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
                $worksheet->setCellValueExplicit(chr($j + $lastRowIndex + 64) . ($i + 1), $cal['count'], DataType::TYPE_STRING);
                ++$j;
                $worksheet->getStyle(chr($j + $lastRowIndex + 64) . ($i))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
                $worksheet->setCellValueExplicit(chr($j + $lastRowIndex + 64) . ($i + 1), $cal['percent'], DataType::TYPE_STRING);
                ++$j;
            }
            ++$i;
        }
        
        // 创建一个新的Excel文件并将修改后的数据写入其中
        // 这里要写入到浏览器里
        $writer = new Xlsx($spreadsheet);
        # $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
        $writer->save($excel_name);
//        die();
        # 添加对应的header头部 其中xxxxx.xls为下载时的文件名
        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename="' . $excel_name . '"');
        header('Cache-Control:max-age=0');
        
        # 写到标准输出中
        $writer->save('php://output');
        die();
    }
}