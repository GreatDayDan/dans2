<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <form name='f1' method="POST" action="process_post.php">
                        <fieldset>
                            <legend> Select an Event </legend>

                            <select name="event_id" id="event_id" class="form-control" required onclose="">
                                <?php $__currentLoopData = $jdevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option name="pid" value="<?php echo e($event->id); ?>" id="event"><?php echo e($event->event); ?></option>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

             <p>

                <input type="text" id="hideme">
                <input type="text" id="ename" name="EVENT" value = "" placeholder="Select an existing or enter a new event">
            </p>
            <p>
                <label id="label4" for="DESCRIPTION">Description</label>
                <textarea rows="5" cols="50" form="f1" name="DESCRIPTION" placeholder="Describe the event" id="DESCRIPTION"></textarea>
            </p>

            <input type='submit' id='submit_id' name='submit_id'</input>
                    </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp64\www\dans2\resources\views/eventsdd.blade.php ENDPATH**/ ?>