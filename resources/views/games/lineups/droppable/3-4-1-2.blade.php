<div id="3-4-1-2" class="droppable-lineup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-2">
                <div class="droppable">
                    <span class="position">LS</span>
                    {!! Form::hidden('positions[ls]', isset($lineup->lineup->ls) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->ls : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RS</span>
                    {!! Form::hidden('positions[rs]', isset($lineup->lineup->rs) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->rs : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">ZOM</span>
                    {!! Form::hidden('positions[zom]', isset($lineup->lineup->zom) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->zom : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LM</span>
                {!! Form::hidden('positions[lm]', isset($lineup->lineup->lm) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->lm : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">LDM</span>
                {!! Form::hidden('positions[ldm]', isset($lineup->lineup->ldm) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->ldm : null) !!}
            </div>
        </div>
        <div class="col-md-3 back">
            <div class="droppable">
                <span class="position">RDM</span>
                {!! Form::hidden('positions[rdm]', isset($lineup->lineup->rdm) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->rdm : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RM</span>
                {!! Form::hidden('positions[rm]', isset($lineup->lineup->rm) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->rm : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">LIV</span>
                    {!! Form::hidden('positions[liv]', isset($lineup->lineup->liv) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->liv : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">IV</span>
                    {!! Form::hidden('positions[iv]', isset($lineup->lineup->iv) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->iv : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RIV</span>
                    {!! Form::hidden('positions[riv]', isset($lineup->lineup->riv) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->riv : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">TW</span>
                    {!! Form::hidden('positions[tw]', isset($lineup->lineup->tw) && $lineup->mode == '3-4-1-2' ? $lineup->lineup->tw : null) !!}
                </div>
            </div>
        </div>
    </div>
</div>
