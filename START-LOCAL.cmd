@echo off
cd /d "%~dp0"
set "TASKS_PHP=C:\xampp\php\php.exe"
if not exist "%TASKS_PHP%" set "TASKS_PHP=php"
"%TASKS_PHP%" -d extension=sqlite3 spark migrate --all
if errorlevel 1 goto fail
"%TASKS_PHP%" -d extension=sqlite3 spark db:seed TaskSeeder
if errorlevel 1 goto fail
start "" http://localhost:8086
"%TASKS_PHP%" -d extension=sqlite3 -S localhost:8086 -t public vendor/codeigniter4/framework/system/rewrite.php
goto :eof
:fail
echo Setup failed. See README.md.
pause
