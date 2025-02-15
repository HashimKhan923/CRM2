<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            ['name' => 'Chief Executive Officer (CEO)'],
            ['name' => 'Chief Operating Officer (COO)'],
            ['name' => 'Chief Financial Officer (CFO)'],
            ['name' => 'Chief Technology Officer (CTO)'],
            ['name' => 'Chief Marketing Officer (CMO)'],
            ['name' => 'General Manager (GM)'],
            ['name' => 'Director'],
            ['name' => 'Vice President (VP)'],
            ['name' => 'Assistant Vice President (AVP)'],
            ['name' => 'Operations Manager'],
            ['name' => 'Manager'],
            ['name' => 'Assistant Manager'],
            ['name' => 'Executive'],
            ['name' => 'Software Engineer'],
            ['name' => 'Senior Software Engineer'],
            ['name' => 'Full Stack Developer'],
            ['name' => 'Frontend Developer'],
            ['name' => 'Backend Developer'],
            ['name' => 'DevOps Engineer'],
            ['name' => 'Cloud Engineer'],
            ['name' => 'Database Administrator'],
            ['name' => 'System Administrator'],
            ['name' => 'Data Scientist'],
            ['name' => 'Data Analyst'],
            ['name' => 'AI/ML Engineer'],
            ['name' => 'Quality Assurance Engineer'],
            ['name' => 'UI/UX Designer'],
            ['name' => 'IT Support Specialist'],
            ['name' => 'Sales Manager'],
            ['name' => 'Sales Executive'],
            ['name' => 'Business Development Manager'],
            ['name' => 'Account Manager'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Digital Marketing Specialist'],
            ['name' => 'Content Marketer'],
            ['name' => 'SEO Specialist'],
            ['name' => 'Social Media Manager'],
            ['name' => 'Brand Manager'],
            ['name' => 'Market Research Analyst'],
            ['name' => 'Public Relations Manager'],
            ['name' => 'HR Manager'],
            ['name' => 'HR Business Partner'],
            ['name' => 'Recruiter'],
            ['name' => 'Training and Development Specialist'],
            ['name' => 'HR Executive'],
            ['name' => 'Compensation and Benefits Specialist'],
            ['name' => 'Employee Relations Specialist'],
            ['name' => 'Accountant'],
            ['name' => 'Senior Accountant'],
            ['name' => 'Financial Analyst'],
            ['name' => 'Investment Analyst'],
            ['name' => 'Auditor'],
            ['name' => 'Tax Specialist'],
            ['name' => 'Payroll Manager'],
            ['name' => 'Chief Accountant'],
            ['name' => 'Credit Analyst'],
            ['name' => 'Budget Analyst'],
            ['name' => 'Customer Support Representative'],
            ['name' => 'Customer Success Manager'],
            ['name' => 'Technical Support Specialist'],
            ['name' => 'Helpdesk Technician'],
            ['name' => 'Call Center Manager'],
            ['name' => 'Supply Chain Manager'],
            ['name' => 'Procurement Manager'],
            ['name' => 'Logistics Coordinator'],
            ['name' => 'Inventory Manager'],
            ['name' => 'Doctor'],
            ['name' => 'Nurse'],
            ['name' => 'Medical Assistant'],
            ['name' => 'Surgeon'],
            ['name' => 'Pharmacist'],
            ['name' => 'Physiotherapist'],
            ['name' => 'Radiologist'],
            ['name' => 'Lab Technician'],
            ['name' => 'Teacher'],
            ['name' => 'Professor'],
            ['name' => 'Lecturer'],
            ['name' => 'Academic Advisor'],
            ['name' => 'School Principal'],
            ['name' => 'Dean'],
            ['name' => 'Researcher'],
            ['name' => 'Lawyer'],
            ['name' => 'Legal Advisor'],
            ['name' => 'Paralegal'],
            ['name' => 'Legal Assistant'],
            ['name' => 'Corporate Counsel'],
            ['name' => 'Graphic Designer'],
            ['name' => 'Creative Director'],
            ['name' => 'Art Director'],
            ['name' => 'Content Writer'],
            ['name' => 'Copywriter'],
            ['name' => 'Video Editor'],
            ['name' => 'Animator'],
            ['name' => 'Photographer'],
        ];

        // Insert the data into the designations table
        DB::table('designations')->insert($designations);
    }
}
