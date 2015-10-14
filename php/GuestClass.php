<?php
Class Guest {
	private $messages;
	private $file;
	
	public function __construct($file){
		try{
			$this->file = $file;
			$xml_file = @file_get_contents($file);
			if (!$xml_file) throw new Exception('Не найден XML файл данных или некорректный его формат.', 1);
			$messages = new SimpleXMLElement(file_get_contents($file));
			$messages_arranged = array();
			$messages = (array) $messages;
			$messages = $messages['message'];
			foreach ($messages as $msg){
				$msg = (array) $msg;
				$parent_id = (string) $msg['parent_id'];
				if ($parent_id === "0") {
					// 1 уровень - сам отзыв
					$messages_arranged[ $msg['id'] ] = $msg;
				} else {
					$parents = explode('_',  $msg['parent_id']);
					if (count($parents) == 1){
						// 2 уровень - ответ на отзыв
						if (!isset($messages_arranged[ $msg['parent_id'] ]['childrens'])){
							$messages_arranged[ $msg['parent_id'] ]['childrens'] = array();
						}
						$messages_arranged[ $msg['parent_id'] ]['childrens'][$msg['id']] = $msg;
					} else {
						// 3 уровень
						if (!isset($messages_arranged[ $parents[1] ]['childrens'][ $parents[0]]['childrens'])) {
							$messages_arranged[ $parents[1] ]['childrens'][ $parents[0]]['childrens'] = array();
						}
						$messages_arranged[ $parents[1] ]['childrens'][ $parents[0]]['childrens'][ $msg['id'] ] = $msg;
					}
				}
			}
			$messages_result = array();
			foreach ($messages_arranged as $msg0){
				$msg0['level'] = 0;
				$messages_result[] = $msg0;
				if (!isset($msg0['childrens'])) continue;
				foreach ($msg0['childrens'] as $msg1){
					$msg1['level'] = 1;
					$messages_result[] = $msg1;
					if (!isset($msg1['childrens'])) continue;
					foreach ($msg1['childrens'] as $msg2){
						$msg2['level'] = 2;
						$messages_result[] = $msg2;
					}
				}
			}
			$this->messages = $messages_result;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	public function getMessages(){
		return $this->messages;
	}
}
