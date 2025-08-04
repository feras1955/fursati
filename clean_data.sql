-- Clean duplicate work fields
DELETE w1 FROM work_fields w1
INNER JOIN work_fields w2 
WHERE w1.id > w2.id AND w1.name = w2.name;

-- Clean duplicate countries
DELETE c1 FROM countries c1
INNER JOIN countries c2 
WHERE c1.id > c2.id AND c1.name = c2.name;

-- Clean duplicate education levels
DELETE e1 FROM education_levels e1
INNER JOIN education_levels e2 
WHERE e1.id > e2.id AND e1.name = e2.name;

-- Show current counts
SELECT 'Work Fields' as table_name, COUNT(*) as count FROM work_fields
UNION ALL
SELECT 'Countries', COUNT(*) FROM countries
UNION ALL
SELECT 'Education Levels', COUNT(*) FROM education_levels
UNION ALL
SELECT 'Jobs', COUNT(*) FROM jobs; 