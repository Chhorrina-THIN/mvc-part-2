<div class="container mt-5">
    <h1>Users List</h1>
    <a href="/users/create" class="btn btn-primary">Create</a>
</div>
<hr>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td>
                      <a href="/users/delete/<?= $user['id'] ?>"><i class="material-icons text-danger">delete</i></a>
                      <a href="/users/edit/<?= $user['id'] ?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>