<?php

use Shanginn\TelegramBotApiBindings\TelegramBotApiSerializer;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberMember;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardButton;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup;

test('InlineKeyboardMarkup is a valid json', function () {
    $serializer = new TelegramBotApiSerializer();
    $inlineKeyboardMarkup = new InlineKeyboardMarkup(
        inlineKeyboard: [
            [
                new InlineKeyboardButton(
                    text: 'Button 1',
                    callbackData: 'data1'
                ),
                new InlineKeyboardButton(
                    text: 'Button 2',
                    callbackData: 'data2'
                ),
            ],
            [
                new InlineKeyboardButton(
                    text: 'Button 3',
                    callbackData: 'data3'
                ),
            ],
        ],
    );

    $arrayKeyboard = [
        'reply_markup' => [
            'inline_keyboard' => [
                [
                    ['text' => 'Button 1', 'callback_data' => 'data1'],
                    ['text' => 'Button 2', 'callback_data' => 'data2'],
                ],
                [
                    ['text' => 'Button 3', 'callback_data' => 'data3'],
                ],
            ],
        ],
    ];

    $json = $serializer->serialize([
        'reply_markup' => $inlineKeyboardMarkup,
    ]);

    expect($json)->toBe(json_encode($arrayKeyboard));
});

test('abstract ChatMember deserialize into concrete class', function () {
    $updatesData = [
        [
            "update_id" => 1,
            "my_chat_member" => [
                "chat" => [
                    "id" => -1234567890,
                    "title" => "FakeChatTitle",
                    "type" => "group",
                ],
                "date" => 1600000000,
                "from" => [
                    "first_name" => "John",
                    "id" => 99999999,
                    "is_bot" => false,
                    "is_premium" => false,
                    "language_code" => "en",
                    "username" => "fakeuser",
                ],
                "new_chat_member" => [
                    "status" => "member",
                    "user" => [
                        "first_name" => "Alice",
                        "id" => 88888888,
                        "is_bot" => true,
                        "username" => "fakebot",
                    ],
                ],
                "old_chat_member" => [
                    "status" => "left",
                    "user" => [
                        "first_name" => "Alice",
                        "id" => 88888888,
                        "is_bot" => true,
                        "username" => "fakebot",
                    ],
                ],
            ],
        ],
    ];

    $serializer = new TelegramBotApiSerializer();
    $updates = $serializer->deserialize(
        data: json_encode($updatesData),
        types: ["array<Shanginn\TelegramBotApiBindings\Types\Update>"]
    );

    expect($updates[0]->myChatMember->newChatMember)
        ->toBeInstanceOf(ChatMemberMember::class);
});