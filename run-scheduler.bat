@echo off
REM Laravel Scheduler Runner for Windows
REM Run this script every minute using Windows Task Scheduler

cd /d C:\laragon\www\RabitFarm
php artisan schedule:run >> storage\logs\scheduler.log 2>&1
