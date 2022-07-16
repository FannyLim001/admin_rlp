<?php
function admin_logged_in() //membatasi akses ke halaman admin
{
    $ci = get_instance();
    if (!$ci->session->userdata('email'))  redirect('auth');
    else 
    {
        $role = $ci->session->userdata('role');
        if ($role != "Admin") redirect('pekerja');
    }
}

function user_logged_in() //membatasi akses ke halaman admin
{
    $ci = get_instance();
    if (!$ci->session->userdata('email'))  redirect('auth');
    else 
    {
        $role = $ci->session->userdata('role');
        if ($role != "Karyawan")  redirect('admin');
    }
}
?>