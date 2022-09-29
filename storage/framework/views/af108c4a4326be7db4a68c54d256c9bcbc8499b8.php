<?php $__env->startSection('content'); ?>
<body>
    <div class="container ">



        <div class="row justify-content-center meblock">





        <h1 class="text-center mt-3">Задачи




         <div class="flex-auto text-right mt-2">
                        <a href="/task" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded" style="float: right;">Новая задача</a>
                    </div></h1>
<table class="w-full text-md rounded mb-4 ">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Задача</th>
                        <th class="text-left p-3 px-5">Пользователь</th>
                        <th class="text-left p-3 px-5">Категория</th>
                        <th class="text-left p-3 px-5">Действие</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="tasks-block flex col">
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="task-item border-b hover:bg-orange-100">

                            <td class="p-3 px-5" style="font-size:30px; word-break: break-all;">

                                <?php echo e($task->description); ?>



                            </td>
                            <td class="p-3 px-5">

                                user id
                                <?php echo e($task->user_id); ?>





                            </td>
                            <td class="p-3 px-5">

                                <?php echo e($task->category['name']); ?>



                            </td>


                            <td class="p-3 px-5">

                                <a href="/task/<?php echo e($task->id); ?>" name="edit" class="mr-3 bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Изменить</a>
                                <form action="/task/<?php echo e($task->id); ?>" class="inline-block">
                                    <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Удалить</button>
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </td>
                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo e($tasks->withQueryString()->links('vendor.pagination.bootstrap-4')); ?>

</div>

                    </tbody>
                </table>
         <form action="<?php echo e(route('home')); ?>" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Поиск</label>
                <input name="search_field" <?php if(isset($_GET['search_field'])): ?> value="<?php echo e($_GET['search_field']); ?>" <?php endif; ?> type="text" class="form-control" id="exampleFormControlInput1" placeholder="напиши текст для поиска">
            </div>

            <button type="submit" class="btn btn-dark">Искать</button>
        </form>

 <form action="<?php echo e(route('home')); ?>" method="get">
 <div class="mb-3">
                <div class="form-label">Выбери сортировку по статусу</div>
                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if(isset($_GET['category_id'])): ?> <?php if($_GET['category_id'] == $category->id): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Подтвердить</button>
        </form>

                </div>







    </div>
    <script src="/js/app.js"></script>
</body>
</html>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\OpenServer\domains\Katya\resources\views/home.blade.php ENDPATH**/ ?>