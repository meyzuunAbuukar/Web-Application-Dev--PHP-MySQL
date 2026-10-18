

<?php
session_start();

$errors = [];
$values = [];

$fields = [
    'name' => 'Student Name',
    'pob' => 'Place of Birth',
    'dob' => 'Date of Birth',
    'address' => 'Address',
    'gender' => 'Gender',
    'telephone' => 'Telephone',
    'email' => 'Email',
    'parent_name' => 'Parent Name',
    'parent_telephone' => 'Parent Telephone',
    'relationship' => 'Relationship',
    'student_id' => 'Student ID',
    'faculty' => 'Faculty',
    'department' => 'Department',
    'class' => 'Class',
    'registration_date' => 'Registration Date'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Collect and validate all text fields
    foreach ($fields as $key => $label) {
        $values[$key] = trim($_POST[$key] ?? '');

        if ($values[$key] === '') {
            $errors[$key] = "$label is required.";
        }
    }

    // 2. Validate student name: letters and spaces only
    if (
        !empty($values['name']) &&
        !preg_match("/^[\p{L}\s]+$/u", $values['name'])
    ) {
        $errors['name'] =
            'Name must contain only letters and spaces.';
    }

    // 3. Validate email
    if (
        !empty($values['email']) &&
        !filter_var($values['email'], FILTER_VALIDATE_EMAIL)
    ) {
        $errors['email'] = 'Enter a valid email address.';
    }

    // 4. Validate image upload
    $imageName = '';
    $allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp'
    ];

    if (
        !isset($_FILES['image']) ||
        $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE
    ) {
        $errors['image'] = 'Please upload a student image.';
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $errors['image'] = 'Image upload failed. Please try again.';
    } else {
        $file = $_FILES['image'];

        if ($file['size'] > 2 * 1024 * 1024) {
            $errors['image'] = 'Image must be 2 MB or smaller.';
        } else {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($file['tmp_name']);

            $extensions = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp'
            ];

            if (
                !in_array($mime, $allowedTypes, true) ||
                !isset($extensions[$mime]) ||
                getimagesize($file['tmp_name']) === false
            ) {
                $errors['image'] =
                    'Only valid JPG, PNG, GIF or WEBP images are allowed.';
            }
        }
    }

    // 5. If validation succeeds, save image and redirect
    if (empty($errors)) {
        $uploadDir = __DIR__ . '/uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate a unique filename
        $imageName = bin2hex(random_bytes(16))
            . '.' . $extensions[$mime];

        if (move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $uploadDir . $imageName
        )) {
            $_SESSION['student'] = $values;
            $_SESSION['student']['image'] = $imageName;

            header('Location: result.php');
            exit;
        } else {
            $errors['image'] =
                'Unable to save the image. Check the uploads folder permissions.';
        }
    }
}

function old($key) {
    return htmlspecialchars(
        $_POST[$key] ?? '',
        ENT_QUOTES,
        'UTF-8'
    );
}

function errorText($key, $errors) {
    if (isset($errors[$key])) {
        return '<p class="mt-1 text-sm text-red-600">'
            . htmlspecialchars($errors[$key], ENT_QUOTES, 'UTF-8')
            . '</p>';
    }
    return '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 py-10 px-4">

<div class="mx-auto max-w-5xl">

    <header class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-indigo-700">
            Student Registration
        </h1>
        <p class="mt-2 text-slate-600">
             PLS Complete all sections to register a student Thank .
        </p>
    </header>

    <?php if (!empty($errors)): ?>
        <div class="mb-6 rounded-xl border border-red-200
                    bg-red-50 p-4 text-red-700">
            <p class="font-semibold">
                Please correct the following errors:
            </p>
            <ul class="mt-2 list-inside list-disc">
                <?php foreach ($errors as $message): ?>
                    <li><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST"
          action="index.php"
          enctype="multipart/form-data"
          class="space-y-6">

        <!-- PERSONAL INFORMATION -->
        <section class="rounded-2xl bg-white p-6 shadow-sm">
            <h2 class="mb-5 border-b pb-3 text-xl font-bold text-indigo-700">
                1. Personal Information
            </h2>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label for="name" class="mb-1 block font-medium">
                        Student Name *
                    </label>
                    <input id="name" name="name" type="text"
                           value="<?= old('name') ?>"
                           class="w-full rounded-lg border p-3 outline-none focus:ring-2 focus:ring-indigo-400">
                    <?= errorText('name', $errors) ?>
                </div>

                <div>
                    <label for="pob" class="mb-1 block font-medium">
                        Place of Birth *
                    </label>
                    <input id="pob" name="pob" type="text"
                           value="<?= old('pob') ?>"
                           class="w-full rounded-lg border p-3 focus:ring-2 focus:ring-indigo-400">
                    <?= errorText('pob', $errors) ?>
                </div>

                <div>
                    <label for="dob" class="mb-1 block font-medium">
                        Date of Birth *
                    </label>
                    <input id="dob" name="dob" type="date"
                           value="<?= old('dob') ?>"
                           class="w-full rounded-lg border p-3 focus:ring-2 focus:ring-indigo-400">
                    <?= errorText('dob', $errors) ?>
                </div>

                <div>
                    <label for="address" class="mb-1 block font-medium">
                        Address *
                    </label>
                    <input id="address" name="address" type="text"
                           value="<?= old('address') ?>"
                           class="w-full rounded-lg border p-3 focus:ring-2 focus:ring-indigo-400">
                    <?= errorText('address', $errors) ?>
                </div>

                <div>
                    <label for="gender" class="mb-1 block font-medium">
                        Gender *
                    </label>
                    <select id="gender" name="gender"
                            class="w-full rounded-lg border bg-white p-3">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= old('gender') === 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= old('gender') === 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>
                    <?= errorText('gender', $errors) ?>
                </div>

                <div>
                    <label for="telephone" class="mb-1 block font-medium">
                        Telephone *
                    </label>
                    <input id="telephone" name="telephone" type="tel"
                           value="<?= old('telephone') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('telephone', $errors) ?>
                </div>

                <div>
                    <label for="email" class="mb-1 block font-medium">
                        Email *
                    </label>
                    <input id="email" name="email" type="email"
                           value="<?= old('email') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('email', $errors) ?>
                </div>

                <div>
                    <label for="image" class="mb-1 block font-medium">
                        Student Image *
                    </label>
                    <input id="image" name="image" type="file"
                           accept=".png,.jpg,.jpeg,.gif,.webp"
                           class="w-full rounded-lg border p-3">
                    <p class="mt-1 text-sm text-slate-500">
                        JPG, PNG, GIF or WEBP. Maximum 2 MB.
                    </p>
                    <?= errorText('image', $errors) ?>
                </div>

            </div>
        </section>

        <!-- PARENT INFORMATION -->
        <section class="rounded-2xl bg-white p-6 shadow-sm">
            <h2 class="mb-5 border-b pb-3 text-xl font-bold text-indigo-700">
                2. Parent Information
            </h2>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label for="parent_name" class="mb-1 block font-medium">
                        Parent Name *
                    </label>
                    <input id="parent_name" name="parent_name" type="text"
                           value="<?= old('parent_name') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('parent_name', $errors) ?>
                </div>

                <div>
                    <label for="parent_telephone" class="mb-1 block font-medium">
                        Parent Telephone *
                    </label>
                    <input id="parent_telephone" name="parent_telephone" type="tel"
                           value="<?= old('parent_telephone') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('parent_telephone', $errors) ?>
                </div>

                <div>
                    <label for="relationship" class="mb-1 block font-medium">
                        Relationship *
                    </label>
                    <select id="relationship" name="relationship"
                            class="w-full rounded-lg border bg-white p-3">
                        <option value="">Select Relationship</option>
                        <?php foreach (['Father', 'Mother', 'Guardian', 'Other'] as $r): ?>
                            <option value="<?= $r ?>" <?= old('relationship') === $r ? 'selected' : '' ?>>
                                <?= $r ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?= errorText('relationship', $errors) ?>
                </div>

            </div>
        </section>

        <!-- ACADEMIC INFORMATION -->
        <section class="rounded-2xl bg-white p-6 shadow-sm">
            <h2 class="mb-5 border-b pb-3 text-xl font-bold text-indigo-700">
                3. Academic Information
            </h2>

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label for="student_id" class="mb-1 block font-medium">
                        Student ID *
                    </label>
                    <input id="student_id" name="student_id" type="text"
                           value="<?= old('student_id') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('student_id', $errors) ?>
                </div>

                <div>
                    <label for="faculty" class="mb-1 block font-medium">
                        Faculty *
                    </label>
                    <input id="faculty" name="faculty" type="text"
                           value="<?= old('faculty') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('faculty', $errors) ?>
                </div>

                <div>
                    <label for="department" class="mb-1 block font-medium">
                        Department *
                    </label>
                    <input id="department" name="department" type="text"
                           value="<?= old('department') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('department', $errors) ?>
                </div>

                <div>
                    <label for="class" class="mb-1 block font-medium">
                        Class *
                    </label>
                    <input id="class" name="class" type="text"
                           value="<?= old('class') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('class', $errors) ?>
                </div>

                <div>
                    <label for="registration_date" class="mb-1 block font-medium">
                        Registration Date *
                    </label>
                    <input id="registration_date" name="registration_date"
                           type="date" value="<?= old('registration_date') ?>"
                           class="w-full rounded-lg border p-3">
                    <?= errorText('registration_date', $errors) ?>
                </div>

            </div>
        </section>

        <div class="flex flex-wrap justify-end gap-3">
            <button type="reset"
                    class="rounded-lg border border-slate-300 bg-white px-6 py-3 font-semibold hover:bg-slate-50">
                Clear Form
            </button>

            <button type="submit"
                    class="rounded-lg bg-indigo-600 px-8 py-3 font-semibold text-white hover:bg-indigo-700">
                Register Student
            </button>
        </div>

    </form>
</div>

<script>
    // Focus the first field containing an error.
    <?php if (!empty($errors)): ?>
        document.addEventListener('DOMContentLoaded', function () {
            const firstError = <?= json_encode(array_key_first($errors)) ?>;
            const field = document.getElementById(firstError);

            if (field) {
                field.focus();
                field.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    <?php endif; ?>
</script>

</body>
</html>
