<?php $__env->startSection('content'); ?>


    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Students Projects.</h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="<?php echo e(route('projects.create')); ?>" title="Create a project"> <i class="fas fa-plus-circle"></i>
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
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($project->name); ?></td>
                                    <td><?php echo e($project->introduction); ?></td>
                                    <td><?php echo e($project->location); ?></td>
                                    <td><?php echo e($project->cost); ?></td>
                                    <td><?php echo e($project->marks); ?></td>
                                    <td><?php echo e(date_format($project->created_at, 'jS M Y')); ?></td>
                                    <td><?php echo e($project->total); ?></td>

                                    <td>
                                        <form action="<?php echo e(route('projects.destroy', $project->id)); ?>" method="POST">

                                            <a href="<?php echo e(route('projects.show', $project->id)); ?>" title="show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a>

                                            <a href="<?php echo e(route('projects.edit', $project->id)); ?>">
                                                <i class="fas fa-edit  fa-lg"></i>

                                            </a>

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>

                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php echo $projects->links(); ?>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/limo/students/resources/views/projects/index.blade.php ENDPATH**/ ?>