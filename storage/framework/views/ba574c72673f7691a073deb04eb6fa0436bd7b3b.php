

<?php $__env->startSection('content'); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Измениь задачу')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            

                <form method="POST" action="/task/<?php echo e($task->id); ?>">

                    <div class="form-group">
                        <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"><?php echo e($task->description); ?></textarea>	
                        <?php if($errors->has('description')): ?>
                            <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <textarea name="category_id" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"><?php echo e($task->category_id); ?></textarea>	
                        <?php if($errors->has('category_id')): ?>
                            <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                        <?php endif; ?>
                    </div>


                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Обновить</button>
                    </div>
                <?php echo e(csrf_field()); ?>

                </form>

            </div>
        </div>
    </div>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OpenServer\domains\Katya\resources\views/edit.blade.php ENDPATH**/ ?>