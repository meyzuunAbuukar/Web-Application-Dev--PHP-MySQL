<?php
session_start();

// Make sure the form was successfully submitted
if (!isset($_SESSION['student'])) {
    header('Location: index.php');
    exit;
}

$student = $_SESSION['student'];

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 px-4 py-10">

<div class="mx-auto max-w-5xl">

    <div class="mb-8 text-center">
        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-3xl text-green-700">
            ✓
        </div>

        <h1 class="text-3xl font-bold text-slate-800">
            Registration Successful!
        </h1>

        <p class="mt-2 text-slate-600">
            The submitted student information is displayed below.
        </p>
    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm">

        <div class="#059669 px-6 py-4 text-white">
            <h2 class="text-xl font-bold">Student Information</h2>
            <p class="mt-1 text-sm text-indigo-100">
                Student ID: <?= e($student['student_id']) ?>
            </p>
        </div>

        <div class="p-6">
            <div class="mb-6 flex justify-center">
                <img
                    src="<?= 'uploads/' . rawurlencode($student['image']) ?>"
                    alt="Student Image"
                    class="h-32 w-32 rounded-full border-4 #059669 object-cover"
                >
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">

                    <thead>
                        <tr class="bg-slate-100">
                            <th class="border p-3">Section</th>
                            <th class="border p-3">Field</th>
                            <th class="border p-3">Submitted Information</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sections = [
                            'Personal Information' => [
                                'name' => 'Student Name',
                                'pob' => 'Place of Birth',
                                'dob' => 'Date of Birth',
                                'address' => 'Address',
                                'gender' => 'Gender',
                                'telephone' => 'Telephone',
                                'email' => 'Email'
                            ],
                            'Parent Information' => [
                                'parent_name' => 'Parent Name',
                                'parent_telephone' => 'Parent Telephone',
                                'relationship' => 'Relationship'
                            ],
                            'Academic Information' => [
                                'student_id' => 'Student ID',
                                'faculty' => 'Faculty',
                                'department' => 'Department',
                                'class' => 'Class',
                                'registration_date' => 'Registration Date'
                            ]
                        ];

                        $sectionIndex = 0;

                        foreach ($sections as $section => $fields):
                            $rowIndex = 0;
                            foreach ($fields as $key => $label):
                                $rowClass = ($rowIndex % 2 === 0)
                                    ? 'bg-white'
                                    : 'bg-slate-50';
                        ?>
                            <tr class="<?= $rowClass ?>">
                                <?php if ($rowIndex === 0): ?>
                                    <td class="border p-3 font-semibold text-indigo-700"
                                        rowspan="<?= count($fields) ?>">
                                        <?= e($section) ?>
                                    </td>
                                <?php endif; ?>

                                <td class="border p-3 font-medium">
                                    <?= e($label) ?>
                                </td>

                                <td class="border p-3 break-words">
                                    <?= e($student[$key]) ?>
                                </td>
                            </tr>
                        <?php
                                $rowIndex++;
                            endforeach;
                            $sectionIndex++;
                        endforeach;
                        ?>

                        <tr class="bg-slate-50">
                            <td class="border p-3 font-semibold text-indigo-700">
                                Personal Information
                            </td>
                            <td class="border p-3 font-medium">Student Image</td>
                            <td class="border p-3">
                                <?= e($student['image']) ?>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <div class="mt-6 flex flex-wrap justify-between gap-3">
                <a href="index.php"
                   class="rounded-lg bg-indigo-600 px-5 py-3 font-semibold text-white hover:bg-indigo-700">
                    Register Another Student
                </a>

                <button onclick="window.print()"
                        class="rounded-lg border border-slate-300 px-5 py-3 font-semibold hover:bg-slate-50">
                    Print Information
                </button>
            </div>
        </div>
    </div>

</div>


</body>
</html>
