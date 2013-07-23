<?php
/*
	Question2Answer Plugin: List Tags Alphabetically
	Plugin Author URI: http://www.echteinfach.tv/
	License: http://www.gnu.org/licenses/gpl.html
*/

	class qa_tags_alphabetically {
		
		var $directory;
		var $urltoroot;
		
		function load_module($directory, $urltoroot)
		{
			$this->directory=$directory;
			$this->urltoroot=$urltoroot;
		}
		
		// for display in admin interface under admin/pages
		function suggest_requests() 
		{	
			return array(
				array(
					'title' => 'Tags Alphabetically', // title of page
					'request' => 'tags-alphabetically', // request name
					'nav' => 'M', // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
				),
			);
		}
		
		// for url query
		function match_request($request)
		{
			if ($request=='tags-alphabetically') {
				return true;
			}

			return false;
		}

		function process_request($request)
		{
			
			/* start */
			$qa_content = qa_content_prepare();

			$qa_content['title'] = 'Tags in Alphabetical Order'; // qa_lang_html('qa_who_flagged_posts_lang/page_title'); // page title

			// counter for custom html output
			$c = 2;
			
			// return if not admin!
			$level=qa_get_logged_in_level();
			if ($level<QA_USER_LEVEL_ADMIN) {
				$qa_content['custom0'] = '<div>You are not allowed to access this page.</div>';
				return $qa_content;
			}
			

			// read all tags into array
			$tagsQuery = qa_db_query_sub('SELECT `tags` FROM `^posts`');
			$tagsList = '';

			// save all tags in array and prevent double tags
			while( ($recentTags = qa_db_read_one_assoc($tagsQuery,true)) !== null ) {
				if(isset($recentTags['tags'])) {
					$tagsList .= $recentTags['tags'].',';
				}
			}
			
			// split string into array
			$allTags = explode(',', $tagsList);
			// remove duplicates
			$allTags = array_unique($allTags);
			// sort all values in array alphabetically
			sort($allTags);
			
			$qa_content['custom'.++$c] = '<ol>';
			for($i=0;$i<sizeof($allTags);$i++) {
				if($allTags[$i]!='') {
					$qa_content['custom'.++$c] = '<li><a href="tag/'.urlencode($allTags[$i]).'">'.$allTags[$i].'</a></li>';
				}
			}
			$qa_content['custom'.++$c] = '</ol>';
			
			return $qa_content;
		}
		
	};
	

/*
	Omit PHP closing tag to help avoid accidental output
*/