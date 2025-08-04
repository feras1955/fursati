-- Create basic data for the application

-- Insert countries
INSERT IGNORE INTO countries (name) VALUES 
('السعودية'), ('الإمارات'), ('مصر'), ('الأردن');

-- Insert education levels
INSERT IGNORE INTO education_levels (name) VALUES 
('ثانوية عامة'), ('دبلوم'), ('بكالوريوس'), ('ماجستير'), ('دكتوراه');

-- Insert work fields
INSERT IGNORE INTO work_fields (name) VALUES 
('تكنولوجيا المعلومات'), ('التصميم الجرافيكي'), ('التسويق'), ('المحاسبة'), ('الموارد البشرية');

-- Insert business user
INSERT IGNORE INTO users (name, email, password, role, country_id, education_level_id, work_experience, phone, bio, created_at, updated_at) VALUES 
('شركة التقنية المتقدمة', 'tech@company.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'business_man', 1, 1, 5, '+966501234567', 'شركة تقنية متقدمة', NOW(), NOW());

-- Insert jobs
INSERT IGNORE INTO jobs (title, work_place, gender_preference, education_level_id, work_experience, work_field_id, country_of_graduation, country_of_residence, business_man_id, description, status, created_at, updated_at) VALUES 
('مطور ويب', 'الرياض', 'all', 1, 2, 1, 1, 1, (SELECT id FROM users WHERE role = 'business_man' LIMIT 1), 'نحتاج مطور ويب ذو خبرة في Laravel و React', 'active', NOW(), NOW()),
('مصمم جرافيك', 'جدة', 'all', 2, 1, 2, 1, 1, (SELECT id FROM users WHERE role = 'business_man' LIMIT 1), 'نحتاج مصمم جرافيك مبدع', 'active', NOW(), NOW()),
('مدير تسويق', 'الدمام', 'all', 3, 3, 3, 1, 1, (SELECT id FROM users WHERE role = 'business_man' LIMIT 1), 'نحتاج مدير تسويق ذو خبرة في التسويق الرقمي', 'active', NOW(), NOW()); 