<div id="4-3-3" class="droppable-lineup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">LF</span>
                    {!! Form::hidden('positions[lf]', isset($lineup->lf) ? $lineup->lf : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">ST</span>
                    {!! Form::hidden('positions[st]', isset($lineup->st) ? $lineup->st : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RF</span>
                    {!! Form::hidden('positions[rf]', isset($lineup->rf) ? $lineup->rf : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">LM</span>
                    {!! Form::hidden('positions[lm]', isset($lineup->lm) ? $lineup->lm : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">ZM</span>
                    {!! Form::hidden('positions[zm]', isset($lineup->zm) ? $lineup->zm : null) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="droppable">
                    <span class="position">RM</span>
                    {!! Form::hidden('positions[rm]', isset($lineup->rm) ? $lineup->rm : null) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LV</span>
                {!! Form::hidden('positions[lv]', isset($lineup->lv) ? $lineup->lv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">LIV</span>
                {!! Form::hidden('positions[liv]', isset($lineup->liv) ? $lineup->liv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RIV</span>
                {!! Form::hidden('positions[riv]', isset($lineup->riv) ? $lineup->riv : null) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="droppable">
                <span class="position">RV</span>
                {!! Form::hidden('positions[rv]', isset($lineup->rv) ? $lineup->rv : null) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-4 col-md-offset-4">
                <div class="droppable">
                    <span class="position">TW</span>
                    {!! Form::hidden('positions[tw]', isset($lineup->tw) ? $lineup->tw : null) !!}
                </div>
            </div>
        </div>
    </div>
</div>