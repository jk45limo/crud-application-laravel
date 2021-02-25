@extends('layouts.app')

@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students Projects.</h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Introduction</th>
                                    <th>Location</th>
                                    <th>Cost</th>
                                    <th>Marks</th>
                                    <th>Date Created</th>
                                    <th>Total</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @foreach ($projects as $project)
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->introduction }}</td>
                                    <td>{{ $project->location }}</td>
                                    <td>{{ $project->cost }}</td>
                                    <td>{{ $project->marks }}</td>
                                    <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                                    <td>{{ $project->total}}</td>

                                    <td>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                                            <a href="{{ route('projects.show', $project->id) }}" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a>

                                            <a href="{{ route('projects.edit', $project->id) }}">
                                                <i class="fas fa-edit  fa-lg"></i>

                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4"> Total </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    {!! $projects->links() !!}

@endsection



