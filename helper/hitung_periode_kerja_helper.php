<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('hitung_periode_kerja')) {
    function hitung_periode_kerja($start_date)
    {
        if (DateTime::createFromFormat('Y-m-d', $start_date) === FALSE) {
            return 'Format tanggal salah';
        } else {
            $current_date = date('Y-m-d'); // Mendapatkan tanggal hari ini dalam format 'YYYY-MM-DD'

            $start_date = new DateTime($start_date); // Membuat objek DateTime dari tanggal mulai kerja

            $current_date = new DateTime($current_date); // Membuat objek DateTime dari tanggal hari ini

            $interval = $start_date->diff($current_date); // Menghitung interval waktu antara tanggal mulai kerja dan tanggal hari ini

            $years = $interval->y; // Menghitung jumlah tahun dari interval waktu

            $months = $interval->m; // Menghitung jumlah bulan dari interval waktu

            $days = $interval->d; // Menghitung jumlah hari dari interval waktu

            if ($start_date > $current_date) { // Pengecekan jika tanggal mulai kerja melebihi tanggal hari ini
                return 'Tanggal melebihi hari ini';
            } else {
                // Pengecekan jika periode kerja lebih dari 1 tahun
                if ($years > 0) {
                    // Pengecekan jika periode kerja juga lebih dari 1 bulan
                    if ($months > 0) {
                        // Mengembalikan jumlah tahun dan bulan dari periode kerja
                        return $years . ' tahun ' . $months . ' bulan';
                    } else {
                        // Mengembalikan jumlah tahun saja dari periode kerja
                        return $years . ' tahun';
                    }
                } else {
                    // Pengecekan jika periode kerja lebih dari 1 bulan
                    if ($months > 0) {
                        // Mengembalikan jumlah bulan saja dari periode kerja
                        return $months . ' bulan';
                    } else {
                        // Pengecekan jika periode kerja lebih dari 1 hari
                        if ($days > 0) {
                            // Mengembalikan jumlah hari saja dari periode kerja
                            return $days . ' hari';
                        } else {
                            // Mengembalikan pesan jika periode kerja sama dengan 0 hari
                            return 'Karyawan baru';
                        }
                    }
                }
            }
        }
    }
}
