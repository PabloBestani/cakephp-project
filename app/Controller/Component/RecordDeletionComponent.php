<?php

App::uses("Component","Controller");

class RecordDeletionComponent extends Component {

    public function deleteRecord($modelName, $recordId) {
        try {
            $model = ClassRegistry::init($modelName);

            if ($model->exists($recordId)) {
                if ($model->delete($recordId)) {
                    return sprintf("%s with id %d deleted successfully.", $modelName, $recordId);
                } else {
                    return sprintf("Error deleting %s with id %d", $modelName, $recordId);
                }
            } else {
                return sprintf("%s with id %d not found.", $modelName, $recordId);
            }
        } catch (\Throwable $th) {
            return sprintf("Error at RecordDeletionComponent: " . $th->getMessage(), $th->getCode());
        }

    }
}