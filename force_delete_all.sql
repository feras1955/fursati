-- FORCE DELETE ALL DATA from the database
-- Run this in phpMyAdmin or MySQL command line

-- Disable foreign key checks
SET FOREIGN_KEY_CHECKS = 0;

-- Show initial counts
SELECT 'Initial Counts:' as info;
SELECT 'work_fields' as table_name, COUNT(*) as count FROM work_fields
UNION ALL
SELECT 'countries' as table_name, COUNT(*) as count FROM countries
UNION ALL
SELECT 'education_levels' as table_name, COUNT(*) as count FROM education_levels
UNION ALL
SELECT 'jobs' as table_name, COUNT(*) as count FROM jobs
UNION ALL
SELECT 'users' as table_name, COUNT(*) as count FROM users
UNION ALL
SELECT 'job_applications' as table_name, COUNT(*) as count FROM job_applications
UNION ALL
SELECT 'favorite_jobs' as table_name, COUNT(*) as count FROM favorite_jobs
UNION ALL
SELECT 'companies' as table_name, COUNT(*) as count FROM companies;

-- FORCE DELETE ALL DATA using TRUNCATE
TRUNCATE TABLE favorite_jobs;
TRUNCATE TABLE job_applications;
TRUNCATE TABLE jobs;
DELETE FROM users WHERE id > 1;
TRUNCATE TABLE work_fields;
TRUNCATE TABLE countries;
TRUNCATE TABLE education_levels;
TRUNCATE TABLE companies;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

-- Show final counts
SELECT 'Final Counts:' as info;
SELECT 'work_fields' as table_name, COUNT(*) as count FROM work_fields
UNION ALL
SELECT 'countries' as table_name, COUNT(*) as count FROM countries
UNION ALL
SELECT 'education_levels' as table_name, COUNT(*) as count FROM education_levels
UNION ALL
SELECT 'jobs' as table_name, COUNT(*) as count FROM jobs
UNION ALL
SELECT 'users' as table_name, COUNT(*) as count FROM users
UNION ALL
SELECT 'job_applications' as table_name, COUNT(*) as count FROM job_applications
UNION ALL
SELECT 'favorite_jobs' as table_name, COUNT(*) as count FROM favorite_jobs
UNION ALL
SELECT 'companies' as table_name, COUNT(*) as count FROM companies; 