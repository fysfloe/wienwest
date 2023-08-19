<div id="4-4-2" class="droppable-lineup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-2">
                <div class="droppable">
                    <span class="position">LS</span>
                    {!! Form::hidden('positions[ls]', isset($lineup->lineup->ls) && $lineup->mode == '4-4-2' ? $lineup->lineup->ls : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RS</span>
                    {!! Form::hidden('positions[rs]', isset($lineup->lineup->rs) && $lineup->mode == '4-4-2' ? $lineup->lineup->rs : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LOM</span>
                {!! Form::hidden('positions[lom]', isset($lineup->lineup->lom) && $lineup->mode == '4-4-2' ? $lineup->lineup->lom : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">LDM</span>
                {!! Form::hidden('positions[ldm]', isset($lineup->lineup->ldm) && $lineup->mode == '4-4-2' ? $lineup->lineup->ldm : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">RDM</span>
                {!! Form::hidden('positions[rdm]', isset($lineup->lineup->rdm) && $lineup->mode == '4-4-2' ? $lineup->lineup->rdm : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">ROM</span>
                {!! Form::hidden('positions[rom]', isset($lineup->lineup->rom) && $lineup->mode == '4-4-2' ? $lineup->lineup->rom : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LV</span>
                {!! Form::hidden('positions[lv]', isset($lineup->lineup->lv) && $lineup->mode == '4-4-2' ? $lineup->lineup->lv : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">LIV</span>
                {!! Form::hidden('positions[liv]', isset($lineup->lineup->liv) && $lineup->mode == '4-4-2' ? $lineup->lineup->liv : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">RIV</span>
                {!! Form::hidden('positions[riv]', isset($lineup->lineup->riv) && $lineup->mode == '4-4-2' ? $lineup->lineup->riv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RV</span>
                {!! Form::hidden('positions[rv]', isset($lineup->lineup->rv) && $lineup->mode == '4-4-2' ? $lineup->lineup->rv : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">TW</span>
                    {!! Form::hidden('positions[tw]', isset($lineup->lineup->tw) && $lineup->mode == '4-4-2' ? $lineup->lineup->tw : null) !!}
                </div>
            </div>
        </div>
    </div>
</div>