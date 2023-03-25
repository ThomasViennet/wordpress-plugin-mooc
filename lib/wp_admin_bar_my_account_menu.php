function wp_admin_bar_my_account_menu( $wp_admin_bar ) {
	$user_id      = get_current_user_id();
	$current_user = wp_get_current_user();

	if ( ! $user_id ) {
		return;
	}

	if ( current_user_can( 'read' ) ) {
		$profile_url = get_edit_profile_url( $user_id );
	} elseif ( is_multisite() ) {
		$profile_url = get_dashboard_url( $user_id, 'profile.php' );
	} else {
		$profile_url = false;
	}

	$wp_admin_bar->add_group(
		array(
			'parent' => 'my-account',
			'id'     => 'user-actions',
		)
	);

	$user_info  = get_avatar( $user_id, 64 );
	$user_info .= "<span class='display-name'>{$current_user->display_name}</span>";

	if ( $current_user->display_name !== $current_user->user_login ) {
		$user_info .= "<span class='username'>{$current_user->user_login}</span>";
	}

	$wp_admin_bar->add_node(
		array(
			'parent' => 'user-actions',
			'id'     => 'user-info',
			'title'  => $user_info,
			'href'   => $profile_url,
			'meta'   => array(
				'tabindex' => -1,
			),
		)
	);

	if ( false !== $profile_url ) {
		$wp_admin_bar->add_node(
			array(
				'parent' => 'user-actions',
				'id'     => 'edit-profile',
				'title'  => __( 'Edit Profile' ),
				'href'   => $profile_url,
			)
		);
	}

	$wp_admin_bar->add_node(
		array(
			'parent' => 'user-actions',
			'id'     => 'logout',
			'title'  => __( 'Log Out' ),
			'href'   => wp_logout_url(),
		)
	);
}