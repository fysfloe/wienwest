<hr>

<h4>Bank</h4>

<hr>

<div class="row bench">
    <div class="col-md-3">
        <div class="droppable">
            <span class="position">Sub1</span>
            {!! Form::hidden('positions[sub1]', isset($lineup->lineup->sub1) ? $lineup->lineup->sub1 : null) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="droppable">
            <span class="position">Sub2</span>
            {!! Form::hidden('positions[sub2]', isset($lineup->lineup->sub2) ? $lineup->lineup->sub2 : null) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="droppable">
            <span class="position">Sub3</span>
            {!! Form::hidden('positions[sub3]', isset($lineup->lineup->sub3) ? $lineup->lineup->sub3 : null) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="droppable">
            <span class="position">Sub4</span>
            {!! Form::hidden('positions[sub4]', isset($lineup->lineup->sub4) ? $lineup->lineup->sub4 : null) !!}
        </div>
    </div>
</div>