import React, { useState } from 'react';
import Helmet from 'react-helmet';
import { Inertia } from '@inertiajs/inertia';
import {InertiaLink, usePage} from '@inertiajs/inertia-react';
import Logo from '@/Shared/Logo';
import LoadingButton from '@/Shared/LoadingButton';
import TextInput from '@/Shared/TextInput';

export default () => {
    const { errors } = usePage().props;
    const [sending, setSending] = useState(false);
    const [values, setValues] = useState({
        email: '',
        password: '',
        remember: false
    });

    function handleChange(e) {
        const key = e.target.name;
        const value =
            e.target.type === 'checkbox' ? e.target.checked : e.target.value;

        setValues(values => ({
            ...values,
            [key]: value
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();
        setSending(true);
        Inertia.post(route('login'), values, {
            onFinish: () => setSending(false)
        });
    }

    return (
        <div className="flex items-center justify-center min-h-screen p-6 bg-indigo-900">
            <Helmet title="Labkom FMIPA UNS | Login" />
            <div className="w-full max-w-md">
                <Logo
                    className="block w-full max-w-xs mx-auto text-white fill-current"
                    height={50}
                />
                <form
                    onSubmit={handleSubmit}
                    className="mt-8 overflow-hidden bg-white rounded-lg shadow-xl"
                >
                    <div className="px-10 py-12">
                        <h1 className="text-3xl font-bold text-center">Welcome Back!</h1>
                        <div className="w-24 mx-auto mt-6 border-b-2" />
                        <TextInput
                            className="mt-10"
                            label="Email"
                            name="email"
                            type="email"
                            errors={errors.email}
                            value={values.email}
                            onChange={handleChange}
                        />
                        <TextInput
                            className="mt-6"
                            label="Password"
                            name="password"
                            type="password"
                            errors={errors.password}
                            value={values.password}
                            onChange={handleChange}
                        />
                        <div className="flex items-center">
                            <label
                                className="inline-flex items-center mt-4"
                                htmlFor="remember"
                            >
                                <input
                                    name="remember"
                                    id="remember"
                                    className="mr-1"
                                    type="checkbox"
                                    checked={values.remember}
                                    onChange={handleChange}
                                />
                                <span className="text-sm mt-1">Remember Me</span>
                            </label>
                            <InertiaLink
                                className="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                                href={ route('password.request') }
                                as="a">
                                { 'Forgot Your Password?' }
                            </InertiaLink>
                        </div>
                    </div>
                    <div className="flex items-center justify-between px-10 py-4 bg-gray-100 border-t border-gray-200">
                        {/*<p className="w-full text-xs text-center text-gray-700 sm:text-sm">*/}
                        {/*    { "Don't have an account? " }*/}
                        {/*    <InertiaLink className="text-blue-500 hover:text-blue-700 no-underline hover:underline"*/}
                        {/*        href={route("register")}*/}
                        {/*        as="a">*/}
                        {/*        { ('Register') }*/}
                        {/*    </InertiaLink>*/}
                        {/*</p>*/}

                        <LoadingButton
                            type="submit"
                            loading={sending}
                            className="btn-indigo"
                        >
                            Login
                        </LoadingButton>
                    </div>
                </form>
            </div>
        </div>
    );
};
