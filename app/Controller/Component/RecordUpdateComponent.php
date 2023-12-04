<?php

App::uses("Component","Controller");

class RecordUpdateComponent extends Component {

    public function updateRecord($modelName, $record, $newData) {
        $model = ClassRegistry::init($modelName);

        $record[$modelName]["name"] = $newData[$modelName]["name"];
        $record[$modelName]["email"] = $newData[$modelName]["email"];
        $record[$modelName]["phone"] = $newData[$modelName]["phone"];

        if ($model->save($record)) {
            echo $modelName . " updated successfully.";
            return $record;
        };
        throw new Exception("Error updating $modelName.");
    }
}