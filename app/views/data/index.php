<div class="container mb-2">
    <?php Flasher::flash(); ?>
    <h2>List of Data</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2 addModalBtn bnt-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Data
    </button>

    <div class="row col-lg-6">
        <form action="<?= BASEURL; ?>/data/search" method="post">
            <div class="input-group mb-3">
                <input type="search" name="search_keyword" id="search_keyword" class="form-control" autocomplete="off" placeholder="Search for Data" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="search-btn">Search</button>
            </div>
        </form>
    </div>


    <table class="table table-hover">
        <thead>
            <tr class="table-info">
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['list_data'] as $data) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $data['name'] ?>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href=" <?= BASEURL; ?>/data/detail/<?= $data['id'] ?>">Detail</a>
                        <a class="btn btn-success btn-sm modalEditBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" href=" <?= BASEURL; ?>/data/edit/<?= $data['id'] ?>" data-id="<?= $data['id'] ?>">Edit</a>
                        <a href="#"
                            class="btn btn-danger btn-sm delete-button"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteModal"
                            data-id="<?= $data['id'] ?>">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditLabel">Form Add Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/data/create" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter the name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" aria-describedby="emailHelp" placeholder="Enter the NIM" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter the E-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Study Program</label>
                        <select class="form-select" id="program" name="program" aria-label="Default select example">
                            <option selected>Select the Program</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Economy">Economy</option>
                            <option value="Graphic Design">Graphic Design</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/data/delete" method="post">
                <div class="modal-body">
                    <p>Are you sure you want to delete this data permanently?</p>
                    <!-- Input hidden untuk menyimpan ID data -->
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Data</button>
                </div>
            </form>
        </div>
    </div>
</div>