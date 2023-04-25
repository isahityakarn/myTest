<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Team</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center g-2">
            <form action="{{ url('index') }}" method="post">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Select Group</label>
                        <select class="form-select form-select-md" name="group_name" id="">
                            <option value="">Select one</option>
                            @foreach ($groups_name as $group)
                                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                            @endforeach
                        </select>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            click to add Group
                        </a>
                        @error('group_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Team Name</label>
                        <input type="text" class="form-control" name="team_name" placeholder="Enter Team name">
                        @error('team_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-end align-items-center g-2">
                    <div class="col-md-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive container">
        <h3>teama deatils</h3>
        <table class="table table-sm table-bordered">
            <tbody>
                @foreach ($groups as $key => $team)
                    <tr class="">
                        <th scope="col">{{ $team[0]->group->group_name }}</th>
                        @foreach ($team as $key1 => $team_detail)
                            <th scope="col">{{ $team_detail->team_name }}</th>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

    </div>
    <div class="container">
        <h3>teama group</h3>
        @php
            for ($i = $total_group; $i >= 1; $i--) {
                $total = 0;
                $rem = 0;
                $result = $total_team % $i == 0;
                if ($result > 0) {
                    $total = $total_team / $i;
                } else {
                    $total1 = $total_team / $i;
                    $total = floor($total1);
                    $rem = $total_team % $i;
                }
                print $i . ' Groups of ' . $total . ' teams ';
                if ($rem > 0) {
                    print '1 Groups of ' . $rem . ' teams';
                }
                echo '<br>';
            }
        @endphp
        <br>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('group-store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <input type="text" class="form-control" name="group_name" id=""
                                    placeholder="Enter Group name">
                                @error('group_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
