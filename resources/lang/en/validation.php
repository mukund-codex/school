<?php

return [
    'first_name' => [
        'required' => 'First Name is required',
        'max' => 'First Name should not be more than 255 characters',
    ],
    'last_name' => [
        'required' => 'Last Name is required',
        'max' => 'Last Name should not be more than 255 characters',
    ],
    'email' => [
        'required' => 'Email is required',
        'email' => 'Email should be a valid email address',
        'unique' => 'Email is already taken',
    ],
    'mobile' => [
        'required' => 'Mobile is required',
        'numeric' => 'Mobile should be a valid number',
        'unique' => 'Mobile is already taken',
        'digits' => 'Mobile should be 10 digits long',
    ],
    'dob' => [
        'required' => 'Date of Birth is required',
        'date' => 'Date of Birth should be a valid date',
    ],
    'role' => [
        'required' => 'Role is required',
        'in' => 'Role should be one of the following: :values',
    ],
    'password' => [
        'required' => 'Password is required',
        'min' => 'Password should be at least 8 characters',
    ],
    'id' => [
        'required' => 'Cannot change status as this is invalid user.',
        'numeric' => 'Cannot change status as this is invalid user.',
        'exists' => 'Cannot change status as this is invalid user.'
    ],
    'address' => [
        'required' => 'Address is required',
    ],
    'gender' => [
        'required' => 'Gender is required.',
        'in' => 'Gender should be one of the following: :values.'
    ],
    'profile_picture' => [
        'image' => 'Invalid image file, please select different file.',
        'mimes' => 'Invalid image file format, please select different file.',
        'max' => 'Image file should not be more than 2MB.'
    ],
    'status' => [
        'required' => 'Status is required.',
        'in' => 'Status should be one of the following: :values.'
    ],
    'is_active' => [
        'required' => 'Is Active is required.',
        'boolean' => 'Is Active should be a boolean value.'
    ],
    'is_email_verified' => [
        'required' => 'Is Email Verified is required.',
        'boolean' => 'Is Email Verified should be a boolean value.'
    ],
    'is_mobile_verified' => [
        'required' => 'Is Mobile Verified is required.',
        'boolean' => 'Is Mobile Verified should be a boolean value.'
    ],
    'name_1' => [
        'required' => 'Name 1 is required',
        'max' => 'Name 1 should not be more than 255 characters',
    ],
    'relation_1' => [
        'required' => 'Relation 1 is required',
        'max' => 'Relation 1 should not be more than 255 characters',
    ],
    'contact_1' => [
        'required' => 'Contact 1 is required',
        'digits' => 'Contact 1 should be 10 digits long',
        'unique' => 'Contact 1 is already taken',
    ],
    'name_2' => [
        'required' => 'Name 2 is required',
        'max' => 'Name 2 should not be more than 255 characters',
    ],
    'relation_2' => [
        'required' => 'Relation 2 is required',
        'max' => 'Relation 2 should not be more than 255 characters',
    ],
    'contact_2' => [
        'required' => 'Contact 2 is required',
        'digits' => 'Contact 2 should be 10 digits long',
        'unique' => 'Contact 2 is already taken',
    ],
    'teacher_id' => [
        'required' => 'Teacher ID is required',
    ],
    'school' => [
        'required' => 'School is required',
    ],
    'degree' => [
        'required' => 'Degree is required',
    ],
    'study' => [
        'required' => 'Study is required',
    ],
    'start_month' => [
        'required' => 'Start Month is required',
    ],
    'start_year' => [
        'required' => 'Start Year is required',
    ],
    'end_month' => [
        'required' => 'End Month is required',
    ],
    'end_year' => [
        'required' => 'End Year is required',
    ],
    'grade' => [
        'required' => 'Grade is required',
    ],
    'description' => [
        'required' => 'Description is required',
    ],
    'title' => [
        'required' => 'Title is required',
    ],
    'employment_type' => [
        'required' => 'Employment Type is required',
        'in' => 'Employment Type should be one of the following: :values',
    ],
    'company' => [
        'required' => 'Company is required',
    ],
    'location' => [
        'required' => 'Location is required',
    ],
    'location_type' => [
        'required' => 'Location Type is required',
        'in' => 'Location Type should be one of the following: :values',
    ],
    'currently_working' => [
        'required' => 'Currently Working is required',
        'boolean' => 'Currently Working should be a boolean value',
    ],
    'name' => [
        'required' => 'Name is required',
        'string' => 'Name should be a string',
        'max' => 'Name should not be more than 255 characters',
    ]
];
