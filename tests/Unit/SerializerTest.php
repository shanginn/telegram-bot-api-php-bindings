<?php

namespace Shanginn\TelegramBotApiBindings\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Shanginn\TelegramBotApiBindings\TelegramBotApiSerializer;
use Shanginn\TelegramBotApiBindings\Types\ChatMemberMember;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardButton;
use Shanginn\TelegramBotApiBindings\Types\InlineKeyboardMarkup;
use Shanginn\TelegramBotApiBindings\Types\Message;
use Shanginn\TelegramBotApiBindings\Types\MessageOriginUser;

class SerializerTest extends TestCase
{
    public function testInlineKeyboardMarkupIsAValidJson()
    {
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

        $this->assertEquals(json_encode($arrayKeyboard), $json);
    }

    public function testAbstractChatMemberDeserializeIntoConcreteClass()
    {
        $updatesData = [
            [
                'update_id' => 1,
                'my_chat_member' => [
                    'chat' => [
                        'id' => -1234567890,
                        'title' => 'FakeChatTitle',
                        'type' => 'group',
                    ],
                    'date' => 1600000000,
                    'from' => [
                        'first_name' => 'John',
                        'id' => 99999999,
                        'is_bot' => false,
                        'is_premium' => false,
                        'language_code' => 'en',
                        'username' => 'fakeuser',
                    ],
                    'new_chat_member' => [
                        'status' => 'member',
                        'user' => [
                            'first_name' => 'Alice',
                            'id' => 88888888,
                            'is_bot' => true,
                            'username' => 'fakebot',
                        ],
                    ],
                    'old_chat_member' => [
                        'status' => 'left',
                        'user' => [
                            'first_name' => 'Alice',
                            'id' => 88888888,
                            'is_bot' => true,
                            'username' => 'fakebot',
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

        $this->assertInstanceOf(ChatMemberMember::class, $updates[0]->myChatMember->newChatMember);
    }

    public function testAbstractMaybeInaccessibleMessageDeserializeIntoConcreteClass()
    {
        $updatesData = [
            [
                'update_id' => 1,
                'callback_query' => [
                    'id' => '123456789012345678',
                    'from' => [
                        'id' => 12345678,
                        'is_bot' => false,
                        'first_name' => 'John',
                        'username' => 'john_doe',
                        'language_code' => 'en',
                        'is_premium' => false,
                    ],
                    'message' => [
                        'message_id' => 12345,
                        'from' => [
                            'id' => 9876543210,
                            'is_bot' => true,
                            'first_name' => 'Test Bot',
                            'username' => 'test_bot',
                        ],
                        'chat' => [
                            'id' => 12345678,
                            'first_name' => 'John',
                            'username' => 'john_doe',
                            'type' => 'private',
                        ],
                        'date' => 1234567890,
                        'text' => 'This is a test message',
                        'reply_markup' => [
                            'inline_keyboard' => [
                                [
                                    ['text' => 'Option 1', 'callback_data' => 'option1'],
                                ],
                            ],
                        ],
                    ],
                    'chat_instance' => '-123456789012345678',
                    'data' => 'download:file123',
                ],
            ],
        ];

        $serializer = new TelegramBotApiSerializer();
        $updates = $serializer->deserialize(
            data: json_encode($updatesData),
            types: ["array<Shanginn\TelegramBotApiBindings\Types\Update>"]
        );

        $this->assertInstanceOf(Message::class, $updates[0]->callbackQuery->message);
    }

    public function testAbstractMessageOriginIntoConcreteClass()
    {
        $updatesData = [
            [
                'update_id' => 1,
                'message' => [
                    'message_id' => 54321,
                    'from' => [
                        'id' => 11223344,
                        'is_bot' => false,
                        'first_name' => 'John',
                        'username' => 'johndoe',
                        'language_code' => 'ru',
                        'is_premium' => true,
                    ],
                    'chat' => [
                        'id' => 11223344,
                        'first_name' => 'John',
                        'username' => 'johndoe',
                        'type' => 'private',
                    ],
                    'date' => 1600000000,
                    'forward_origin' => [
                        'type' => 'user',
                        'sender_user' => [
                            'id' => 11223344,
                            'is_bot' => false,
                            'first_name' => 'John',
                            'username' => 'johndoe',
                            'language_code' => 'ru',
                            'is_premium' => true,
                        ],
                        'date' => 1600000500,
                    ],
                    'forward_from' => [
                        'id' => 11223344,
                        'is_bot' => false,
                        'first_name' => 'John',
                        'username' => 'johndoe',
                        'language_code' => 'ru',
                        'is_premium' => true,
                    ],
                    'forward_date' => 1600000500,
                ],
            ],
        ];

        $serializer = new TelegramBotApiSerializer();
        $updates = $serializer->deserialize(
            data: json_encode($updatesData),
            types: ["array<Shanginn\TelegramBotApiBindings\Types\Update>"]
        );

        $this->assertInstanceOf(MessageOriginUser::class, $updates[0]->message->forwardOrigin);
    }
}
