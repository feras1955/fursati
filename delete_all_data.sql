-- Delete ALL data from the database
-- Run this in phpMyAdmin or MySQL command line

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

-- Delete data in correct order (respecting foreign keys)
-- Delete job-related data first
DELETE FROM favorite_jobs;
DELETE FROM job_applications;
DELETE FROM jobs;

-- Delete user data (keep admin if exists)
DELETE FROM users WHERE id > 1;

-- Delete lookup data
DELETE FROM work_fields;
DELETE FROM countries;
DELETE FROM education_levels;
DELETE FROM companies;

-- Reset auto-increment counters
ALTER TABLE work_fields AUTO_INCREMENT = 1;
ALTER TABLE countries AUTO_INCREMENT = 1;
ALTER TABLE education_levels AUTO_INCREMENT = 1;
ALTER TABLE jobs AUTO_INCREMENT = 1;
ALTER TABLE companies AUTO_INCREMENT = 1;
ALTER TABLE job_applications AUTO_INCREMENT = 1;
ALTER TABLE favorite_jobs AUTO_INCREMENT = 1;

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