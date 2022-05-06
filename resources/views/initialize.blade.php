<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Howler - Initialize Site</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/base.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/action_bar.css') }}" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<div class="contentContainerSmall">
    <h1>Welcome to Howler!</h1>
    <p>
        We'll help you get your site configured and
        ready for visitors.
    </p>

    <form action="/initialize/save" method="post">
        @csrf
        <input type="hidden" name="action" value="initialize">

        <h2>Site Information</h2>
        <div class="formSection">
            <fieldset>
                <div>
                    <label for="siteName">
                        Site Name
                    </label>
                    <input type="text" id="siteName" name="siteName">
                </div>
            </fieldset>
        </div>

        <h2>About You</h2>
        <div class="formSection">
            <fieldset>
                <div>
                    <label for="bioName">
                        Bio Name
                    </label>
                    <input type="text" id="bioName" name="bioName">
                </div>
                <div>
                    <label for="bio">
                        Bio
                    </label>
                    <textarea name="bio" id="bio"></textarea>
                </div>
                <div>
                    <label for="location">
                        Location
                    </label>
                    <input type="text" id="location" name="location" placeholder="optional">
                </div>
            </fieldset>
        </div>

        <h2>Create Account</h2>
        <div class="formSection">
            <fieldset>
                <div>
                    <label for="fullName">
                        Full Name
                    </label>
                    <input type="text" id="fullName" name="fullName">
                </div>
                <div>
                    <label for="emailAddress">
                        Email Address
                    </label>
                    <input type="email" id="emailAddress" name="emailAddress" class="formFieldStandardBottomMargin">
                    <p class="formSectionFieldText formField10pxBottomMargin">Your email address will be used as your login username.</p>
                </div>
                <div>
                    <label for="password">
                        Password
                    </label>
                    <input type="text" id="password" name="password" autocomplete="new-password">
                </div>
            </fieldset>
        </div>

        <h2>Features</h2>
        <div class="formSection">
            <fieldset>
                <div class="checkItem">
                    <input type="checkbox" name="useMicroblog" id="useMicroblog" value="1" checked>
                    <label style="display: inline;" for="useMicroblog">Enable Microblog</label>
                </div>
                <div class="checkItem" style="margin-left: 30px;">
                    <input type="checkbox" name="allowRSSFeeds" id="allowRSSFeeds" value="1" checked>
                    <label style="display: inline;" for="allowRSSFeeds">Enable RSS Feed</label>
                </div>
                <div class="checkItem" style="margin-left: 30px;">
                    <input type="checkbox" name="allowAtomFeeds" id="allowAtomFeeds" value="1" checked>
                    <label style="display: inline;" for="allowAtomFeeds">Enable Atom Feed</label>
                </div>
                <div class="checkItem">
                    <input type="checkbox" name="useBookmarks" id="useBookmarks" value="1" checked>
                    <label style="display: inline;" for="useBookmarks">Show My Bookmarks</label>
                </div>
                <div class="checkItem">
                    <input type="checkbox" name="useFollowing" id="useFollowing" value="1" checked>
                    <label style="display: inline;" for="useFollowing">Show Who I'm Following</label>
                </div>
            </fieldset>
        </div>

        <div class="action-bar" style="width: 100%;">
            <div class="action-bar-left">

            </div>
            <div class="action-bar-right">
                <button type="submit">Finish Set Up</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>
