<?php
session_start();
// Lấy danh sach sinh viên lưu tạm trong session
function getAllStudents(){
    return isset($_SESSION['students']) ? $_SESSION['students'] : array();
}
// Lấy thông tin sinh viên = id
function getStudent($student_id){
    // Lấy danh sách sinh viên 
    $students = getAllStudents(); 
    // Duyệt từng phần tử, trả về nếu trùng id
    foreach ($students as $item){
        if ($item['student_id'] == $student_id){
            return $item;
        }
    }
     return array();
} 
// Xóa thông tin sinh viên = ID
function deleteStudent($student_id){
    $students = getAllStudents();
    foreach ($students as $key => $item){
        // xóa thông tin sinh viên = hàm unset
        if ($item['student_id'] == $student_id){
            unset($students[$key]);
        }
    } 
    // Cập nhật lại Session
    $_SESSION['students'] = $students; 
    return $students;
} 
// Thêm-sửa thông tin sinh viên
function updateStudent($student_id, $student_name, $student_email){
    $students = getAllStudents();
    // Khai báo cấu trúc lưu thông tin sinh viên
    $new_student = array(
        'student_id' => $student_id,
        'student_name' => $student_name,
        'student_email' => $student_email);
     // Update thông tin sinh viên
    $is_update_action = false;
    foreach ($students as $key => $item){
        if ($item['student_id'] == $student_id){
            $students[$key] = $new_student;
            // khai báo đây là action update
            $is_update_action = true; 
            
        }
    } 
    // Update false->Add thông tin sinh viên
    if (!$is_update_action){
        $students[] = $new_student;
    } 
    // Update Data trong Session
    $_SESSION['students'] = $students; 
    return $students;
}
?>