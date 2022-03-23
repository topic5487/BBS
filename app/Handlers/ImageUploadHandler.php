<?php

namespace App\Handlers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageUploadHandler
{
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // 規劃存放的資料夾規則，值如：uploads/images/avatars/201709/21/
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // 資料具體存放路徑，public_path() 獲取 public 資料夾路徑。
        // 值如：/home/Code/bbs/public/uploads/images/avatars/202203/21/
        $upload_path = public_path() . '/' . $folder_name;

        // 獲取檔案的檔名
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接檔案名稱
        // 如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        // 如果上傳的不是圖片就終止
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 將圖片移動到目標存放路徑中
        $file->move($upload_path, $filename);

        if ($max_width && $extension != 'gif') {
            //裁剪圖片
            $this->reduceSize($upload_path . '/' . $filename, $max_width);
        }

        return [
            'path' => config('app.url') . "/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path, $max_width){
        $image = Image::make($file_path);

        $image->resize($max_width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->save();
    }
}
