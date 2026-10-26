import { Head, router, useForm } from '@inertiajs/react';
import { ArrowLeft, Save } from 'lucide-react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

type Dosen = {
    nidn: string;
    nama: string;
    jabatan: string;
    kepakaran: string;
};

export default function DosenForm({ dosen }: { dosen?: Dosen }) {
    const { data, setData, post, put, processing, errors } = useForm({
        nidn: dosen?.nidn ?? '',
        nama: dosen?.nama ?? '',
        jabatan: dosen?.jabatan ?? '',
        kepakaran: dosen?.kepakaran ?? '',
    });

    const submit = (event: React.FormEvent) => {
        event.preventDefault();
        if (dosen) {
            put(`/dosen/${dosen.nidn}`);
        } else {
            post('/dosen');
        }
    };

    return (
        <>
            <Head title={dosen ? 'Edit Dosen' : 'Tambah Dosen'} />
            <main className="mx-auto w-full max-w-2xl p-4 sm:p-8">
                <button
                    type="button"
                    onClick={() => router.visit('/')}
                    className="mb-5 inline-flex items-center gap-2 text-sm text-muted-foreground hover:text-foreground"
                >
                    <ArrowLeft className="size-4" /> Kembali ke daftar
                </button>

                <section className="rounded-lg border bg-card p-5 shadow-sm sm:p-7">
                    <div className="mb-6 border-b pb-5">
                        <p className="text-sm text-muted-foreground">Data dosen pembimbing</p>
                        <h1 className="mt-1 text-2xl font-bold">
                            {dosen ? 'Edit Data Dosen' : 'Tambah Data Dosen'}
                        </h1>
                    </div>

                    <form onSubmit={submit} className="grid gap-5">
                        <div className="grid gap-2">
                            <Label htmlFor="nidn">NIDN</Label>
                            <Input
                                id="nidn"
                                value={data.nidn}
                                onChange={(event) => setData('nidn', event.target.value)}
                                readOnly={Boolean(dosen)}
                                maxLength={20}
                                required
                                placeholder="Masukkan NIDN"
                            />
                            <InputError message={errors.nidn} />
                        </div>

                        {([
                            ['nama', 'Nama Lengkap', 'Masukkan nama lengkap'],
                            ['jabatan', 'Jabatan Fungsional', 'Contoh: Dosen atau Profesor'],
                            ['kepakaran', 'Kepakaran Riset', 'Contoh: Sistem Basis Data'],
                        ] as const).map(([field, label, placeholder]) => (
                            <div className="grid gap-2" key={field}>
                                <Label htmlFor={field}>{label}</Label>
                                <Input
                                    id={field}
                                    value={data[field]}
                                    onChange={(event) => setData(field, event.target.value)}
                                    maxLength={field === 'nama' ? 100 : field === 'jabatan' ? 50 : 100}
                                    required
                                    placeholder={placeholder}
                                />
                                <InputError message={errors[field]} />
                            </div>
                        ))}

                        <div className="mt-2 flex justify-end gap-2">
                            <Button type="button" variant="outline" onClick={() => router.visit('/')}>
                                Batal
                            </Button>
                            <Button type="submit" disabled={processing}>
                                <Save /> {processing ? 'Menyimpan...' : 'Simpan Data'}
                            </Button>
                        </div>
                    </form>
                </section>
            </main>
        </>
    );
}

DosenForm.layout = {
    breadcrumbs: [{ title: 'Data Dosen', href: '/' }],
};
