<?php

App::uses("Component","Controller");

class RecordCreationComponent extends Component {

    public function addRecord($modelName, $data) {
        try {
        $createdRecords = [];
        $model = ClassRegistry::init($modelName);

        foreach ($data as $record) {
            $newRecord = $model->create($record);
            if (!$model->save($newRecord)) {
                throw new Exception("Error creating a $modelName");
            }
            $createdRecords[] = $newRecord;
        }
        return $createdRecords;

        } catch (\Throwable $th) {
            return sprintf("Error at RecordCreationComponent: " . $th->getMessage(), $th->getCode());
        }
    }
}