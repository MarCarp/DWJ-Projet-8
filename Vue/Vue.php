<?php
class Vue
{
	private $_file, $title;
	public function __construct($action)
	{
		$this->file = "Vue/vue" . $action . ".php";
	}

	public function generate($data)
	{
		$content = $this->generateFile($this->_file, $data);
		$vue = $this->generateFile('Vue/template.php', array('title' => $this->title, 'content' => $contenu));
		echo $vue;
	}

	private function generateFile($file, $data)
	{
		if(file_exists($file))
		{
			extract($data);
			ob_start();
			require $file;
			return ob_get_clean();
		}
		else
		{
			throw new Exception("Fichier '$file' introuvable");
			
		}
	}
}