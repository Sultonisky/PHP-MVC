<div class="container mt-1">
    <h2>Detail Data</h2>
    <table class="table table-hover">
        <thead>
            <tr class="table-info">
                <th scope="col">Name</th>
                <th scope="col">Nim</th>
                <th scope="col">Email</th>
                <th scope="col">Study Program</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['list_data']['name']; ?></td>
                <td><?= $data['list_data']['nim']; ?></td>
                <td><?= $data['list_data']['email']; ?></td>
                <td><?= $data['list_data']['program']; ?></td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary btn-sm" href="<?= BASEURL; ?>/data">Back</a>
</div>