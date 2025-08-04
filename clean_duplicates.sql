-- Clean all duplicates in the database
-- Run this in phpMyAdmin or MySQL command line

-- Show initial counts
SELECT 'Initial Counts:' as info;
SELECT 'work_fields' as table_name, COUNT(*) as count FROM work_fields
UNION ALL
SELECT 'countries' as table_name, COUNT(*) as count FROM countries
UNION ALL
SELECT 'education_levels' as table_name, COUNT(*) as count FROM education_levels;

-- Clean duplicate work_fields (keep the one with lowest ID)
DELETE w1 FROM work_fields w1 
INNER JOIN work_fields w2 
WHERE w1.id > w2.id AND w1.name = w2.name;

-- Clean duplicate countries (keep the one with lowest ID)
DELETE c1 FROM countries c1 
INNER JOIN countries c2 
WHERE c1.id > c2.id AND c1.name = c2.name;

-- Clean duplicate education_levels (keep the one with lowest ID)
DELETE e1 FROM education_levels e1 
INNER JOIN education_levels e2 
WHERE e1.id > e2.id AND e1.name = e2.name;

-- Show final counts
SELECT 'Final Counts:' as info;
SELECT 'work_fields' as table_name, COUNT(*) as count FROM work_fields
UNION ALL
SELECT 'countries' as table_name, COUNT(*) as count FROM countries
UNION ALL
SELECT 'education_levels' as table_name, COUNT(*) as count FROM education_levels;

-- Show sample data to verify
SELECT 'Sample Work Fields:' as info;
SELECT id, name FROM work_fields ORDER BY id LIMIT 10;

SELECT 'Sample Countries:' as info;
SELECT id, name FROM countries ORDER BY id LIMIT 10;

SELECT 'Sample Education Levels:' as info;
SELECT id, name FROM education_levels ORDER BY id LIMIT 10; 