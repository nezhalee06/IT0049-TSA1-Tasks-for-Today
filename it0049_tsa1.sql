-- Import into an EMPTY dedicated database. No login or passwords are required.
CREATE TABLE tasks (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(150) NOT NULL,
 status VARCHAR(20) NOT NULL DEFAULT 'pending',
 task_date DATE NOT NULL,
 created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE users (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) NOT NULL UNIQUE,
 full_name VARCHAR(100) NOT NULL,
 email VARCHAR(100) NOT NULL,
 created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Philippine date calculated independently of the MySQL server timezone.
SET @today = DATE(UTC_TIMESTAMP() + INTERVAL 8 HOUR);
SET @now = UTC_TIMESTAMP() + INTERVAL 8 HOUR;
INSERT INTO tasks (title,status,task_date,created_at) VALUES
 ('Review the activity requirements','completed',DATE_SUB(@today,INTERVAL 1 DAY),@now),
 ('Prepare the database design','completed',DATE_SUB(@today,INTERVAL 1 DAY),@now),
 ('Create the project layout','completed',DATE_SUB(@today,INTERVAL 1 DAY),@now),
 ('Check today\'s task schedule','completed',@today,@now),
 ('Finish the Welcome page','pending',@today,@now),
 ('Review the task list with the team','pending',@today,@now),
 ('Update the project documentation','pending',DATE_ADD(@today,INTERVAL 1 DAY),@now),
 ('Test all four application pages','pending',DATE_ADD(@today,INTERVAL 1 DAY),@now),
 ('Prepare the submission links','pending',DATE_ADD(@today,INTERVAL 1 DAY),@now);
INSERT INTO users (username,full_name,email,created_at) VALUES
 ('demo_user','Alex Santos','alex.santos@example.com',@now);
