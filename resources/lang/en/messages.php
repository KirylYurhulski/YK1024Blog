<?php

return [
  	'welcome' => 'Hi, my name is Kiril Yurgulsky. Briefly introduce yourself here. You
							can also provide a link to one of the social networks.',
	'mainMenu' =>[
		'home' => 'Home',
	],
	'readPost' => 'Read more',
	'copyright' => 'Personal Blog by',
	'admin' => [
	    'Yes' => 'Yes',
        'No' => 'No',
		'title' => 'Blog management',
		'logout' => 'Logout',
		'confOperModalTitle' => 'Confirme Operation',
		'buttonOk' => 'Ok',
		'buttonCancel' => 'Cancel',
		'mainMenu' => [
			'userTitle' => 'User mangement',
			'users' => 'Users',
			'pageAbout' => 'Page "About Me"',
			'blogTitle' => 'Blog mangement',
			'categories' => 'Categories',
			'posts' => 'Posts'
		],
		'userManagementPage' => [
			'new' => 'New user registration',
			'confDel' => 'Are you sure you want to delete this user?',
			'buttonDelete' => 'Delete',
                        'registeredSuccessfully' => 'User successfully registered',
                        'deletedSuccessfully' => 'User deleted successfully',
                        'errorRegistering' => 'Error registering user',
                        'errorDeleting' => 'Error deleting user',
                        'notFoundID' => 'User with id = :id not registered',
			'listTitle' => [
				'id' => 'ID',
				'name' => 'Name',
				'email' => 'E-mail',
				'createdAt' => 'Created at'
			]
		],
		'categoryManagementPage' => [
			'new' => 'Create new category',
			'confDel' => 'Are you sure you want to delete this category?',
			'buttonDelete' => 'Delete',
            'buttonRecover' => 'Recover',
			'buttonSave' => 'Save',
                        'categoryExist' => 'Category is already exist',
                        'savedSuccessfully' => 'Category saved successfully',
                        'deletedSuccessfully' => 'Category deleted successfully',
                        'errorCreating' => 'Error creating category',
                        'errorUpdating' => 'Error updating category',
                        'errorDeleting' => 'Error deleting category',
                        'notFoundID' => 'Category with id = :id not found',
                        'notFound' => 'Category not found',
			'listTitle' => [
				'id' => 'ID',
				'title' => 'Title',
				'descr' => 'Description',
				'createdAt' => 'Created at',
				'updatedAt' => 'Updated at',
				'deletedAt' => 'Deleted at'
			],
			'modifyPage' => [
				'fieldTitle' => 'Title:',
				'fieldDescr' => 'Description:',
				'fieldCreatedAt' => 'Created At:',
				'fieldUpdatedAt' => 'Updated At:',
				'fieldDeletedAt' => 'Deleted At:',
				'fieldRequired' => '* Required'
			]
		],
		'postManagementPage' => [
			'new' => 'Create new post',
			'confDel' => 'Are you sure you want to delete this post?',
			'buttonDelete' => 'Delete',
            'buttonRecover' => 'Recover',
			'buttonSave' => 'Save',
                        'savedSuccessfully' => 'Post saved successfully',
                        'deletedSuccessfully' => 'Post deleted successfully',
                        'errorCreating' => 'Error creating post',
                        'errorUpdating' => 'Error updating post',
                        'errorDeleting' => 'Error deleting post',
                        'notFoundID' => 'Post with id = :id not found',
			'listTitle' => [
				'id' => 'ID',
				'categoryTitle' => 'Category',
				'author' => 'Author',
				'title' => 'Title',
				'publishedAt' => 'Published At',
				'createdAt' => 'Created at',
				'updatedAt' => 'Updated at',
				'deletedAt' => 'Deleted at'
			],
			'modifyPage' => [
				'selectCategoryDefault' => 'Select category...',
				'fieldCategory' => 'Category:',
                'fieldIsPublished' => 'Is Published:',
				'fieldTitle' => 'Title:',
				'fieldDescr' => 'Description:',
				'fieldRequired' => '* Required'
			]
		]
	]
];
