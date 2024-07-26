<?php
// ধাপ 1: ছাত্র শ্রেণীর সংজ্ঞায়িত করুন
class Student {
    private $id;
    private $name;
    private $email;
    private $phone;
   
    private static $file_path = "data.txt";

    //অবজেক্ট আরম্ভ করার কনস্ট্রাক্টর
    public function __construct($_id, $_name, $_email, $_phone) {
        $this->id = $_id;
        $this->name = $_name;
        $this->email = $_email;
        $this->phone = $_phone;
    }

    // শিক্ষার্থীদের ডেটাকে CSV ফর্ম্যাটে রূপান্তর করার ফাংশন
    public function toCsv() {
        return "{$this->id},{$this->name},{$this->email},{$this->phone}" . PHP_EOL;
    }

    // ফাইলে ছাত্র ডেটা সংরক্ষণ করার ফাংশন
    public function save() {
        $students = file(self::$file_path);
        file_put_contents(self::$file_path, $this->toCsv(), FILE_APPEND);
    }

    /// একটি টেবিলে সমস্ত ছাত্রদের display করার ফাংশন
public static function display_students() {
  $students = file(self::$file_path);

  echo "<table border='2'>";
  echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>PHONE</th>
       </tr>";

  foreach ($students as $student) {
      list($id, $name, $email, $phone) = explode(",", trim($student, 0 ));
      echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>$phone</td>
            </tr>";
  }

  echo "</table>";
}

    }


// class শ্রেণীর oop শেষ
?>
