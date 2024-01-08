<?php

namespace PHPexcle;

use PhpOffice\PhpSpreadsheet\IOFactory;

class File
{
    public function testFile(){
        // composer require phpoffice/phpspreadsheet
        require '../vendor/autoload.php';
        try {
            // 上传的 Excel 文件
            $uploadedFile = $_FILES['file'];
            // 获取上传文件的临时路径
            $tmpFilePath = $uploadedFile['tmp_name'];
            // 移动上传文件到目标位置
            $targetFilePath = './uploads' . $uploadedFile['name'];
            move_uploaded_file($tmpFilePath, $targetFilePath);
            // 使用 PhpSpreadsheet 读取文件内容
            $spreadsheet = IOFactory::load($targetFilePath);
            $highestColumn = $spreadsheet->getActiveSheet()->getHighestColumn();
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $mergeCells = $spreadsheet->getActiveSheet()->getMergeCells();
            // 处理合并单元格
            foreach ($mergeCells as $mergeCell) {
//                list($startColumn, $startRow, $endColumn, $endRow)
                $cellData = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::rangeBoundaries($mergeCell);
                //这是处理合并得单元格  根据实际需求修改
                $startColumn = $cellData[0][0];
                $endColumn = $cellData[1][0];
                $startRow = $cellData[0][1];
                $endRow = $cellData[1][1];
                // 获取合并单元格的值
                //$mergedValue = $spreadsheet->getActiveSheet()->getCell($startColumn . $startRow)->getValue();
//                $mergedValue = $spreadsheet->getActiveSheet()->getCell(
//                    \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumn) . $startRow
//                )->getValue();
                // // 获取合并单元格的值去掉样式得
                $mergedValue = $spreadsheet->getActiveSheet()->getCell(
                    \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumn) . $startRow
                )->getCalculatedValue();
                $seatRow = [];
                for ($i='A';$i<'ZZ';$i++){
                    $seatRow[] = $i;
                }
                // 设置合并单元格的值到每个单元格
                for ($row = $startRow; $row <= $endRow; $row++) {
                    for ($column = $startColumn; $column <= $endColumn; $column++) {
                        if (isset($seatRow[$column-1])){
                            $sheetData[$row][$seatRow[$column-1]] = $mergedValue;
                        }
                    }
                }
            }
            $firstData = $sheetData[1]??[];
            $err = [];
            $saveData = [];
            unset($sheetData[1]);
            foreach ($sheetData as $k=>$v){
                foreach ($v as $c=>$y){
                    if ($c =='A'){
                        $d =1;
                    }
                    //这就是name
                    if (isset($firstData[$c])){
                        $pattern = '/[^\p{Han}]/u'; // 匹配非汉字的任意字符
// 使用preg_replace函数将非法字符替换为空白字符
                        $result = preg_replace($pattern, '', $y);
                        if ($result){
                            $saveData[]=[
//                            'name'=>str_replace([" ","/n", "/r/n"],'',$y),
                                'name'=>str_replace([" ","/n", "/r/n"],'',$result),
                                'seat_no'=>$k-1 . '排'. $firstData[$c].'号',
                                'seat_no_real'=>$k-1 . '排'. $d.'号',
                            ];
                        }

                    }else{
                        $err[] = $y;
                    }
                    $d++;
                }
            }
            print_r($saveData);
        } catch (\Exception  $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}